<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminTermAndConditionController extends Controller
{
    public function index()
    {
        return view('admin.term-and-conditions.index');
    }

    public function show()
    {
        return view('admin.term-and-conditions.show');
    }

    public function store()
    {
        return view('admin.term-and-conditions.create');
    }

    public function update()
    {
        return view('admin.term-and-conditions.update');
    }
}
