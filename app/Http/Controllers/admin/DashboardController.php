<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\LogRepository;



class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.dashboard', compact([]));
        // return view('backend.dashboard', compact([]));
    }
    function logs()
    {
        return LogRepository::getWithPaginate(30);
    }
}