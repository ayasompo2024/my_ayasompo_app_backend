<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestFormController extends Controller
{

    public function index()
    {
        $requestForms = [];
        return view("admin.request-form.lists")->with('requestForms', $requestForms);
    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }

    public function storeRequestFormType(Request $request)
    {
        return $request->all();
    }

}
