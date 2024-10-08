<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LogAdminRequest;
use App\Repositories\LogRepository;
use App\Services\UtilityService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request, UtilityService $utilityService)
    {
        $count_customer = $utilityService->countTotalCustomer();
        $currentMonthChart = $utilityService->currentMonthChart();
        $userType = $utilityService->userType();

        return view('admin.dashboard.dashboard', compact(['count_customer', 'currentMonthChart', 'userType']));
    }

    public function logs()
    {
        $logs = LogRepository::getWithPaginate(30);

        return view('admin.dashboard.logs', compact(['logs']));
    }

    public function adminLogs(Request $request)
    {
        $query = LogAdminRequest::with('admin:id,name,role');
        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }
        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }
        $logs = $query->orderByDesc('id')->paginate(30);
        $logs->appends([
            'user_id' => $request->user_id,
            'date' => $request->date,
        ]);

        return view('admin.dashboard.logs', compact('logs'));
    }
}
