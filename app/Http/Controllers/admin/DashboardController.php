<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Repositories\LogRepository;
use App\Services\UtilityService;

class DashboardController extends Controller
{

    public function index(UtilityService $utilityService)
    {
        $count_customer = $utilityService->countTotalCustomer();
        $currentMonthChart = $utilityService->currentMonthChart();
        return view('admin.dashboard.dashboard', compact(['count_customer','currentMonthChart']));
    }
    function logs()
    {
        $logs =  LogRepository::getWithPaginate(30);
        return view('admin.dashboard.logs', compact(['logs']));
    }   
}


