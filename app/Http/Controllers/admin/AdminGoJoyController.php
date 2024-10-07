<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminGoJoyController extends Controller
{
    public function index()
    {
        return view('admin.gojoy.index');
    }

    public function show()
    {
        return view('admin.gojoy.show');
    }
}
