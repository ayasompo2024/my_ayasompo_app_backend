<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\RequestFormService;
use Illuminate\Http\Request;

class RequestFormController extends Controller
{

    public function index(RequestFormService $requestFormService)
    {
        return view("admin.request-form.lists")->with('requestForms', $requestFormService->getWithPaginate(30));
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
