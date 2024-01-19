<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\LogRepository;
use App\Services\UtilityService;

class DashboardController extends Controller
{

    public function index(UtilityService $utilityService)
    {
        $count_customer = $utilityService->countTotalCustomer();
        return view('admin.dashboard.dashboard', compact([]));
    }
    function logs()
    {
        $logs =  LogRepository::getWithPaginate(30);
        return view('admin.dashboard.logs', compact(['logs']));
    }
}


