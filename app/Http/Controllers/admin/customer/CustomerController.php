<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;



class CustomerController extends Controller
{

    public function index()
    {
        return 'no data';
        // return view('admin.customers.index')->with('customers', $customer_service->getAll(10));
    }

    public function shopOwners()
    {
       // return $customer_service->shopOwners();
    }
    public function show($id)
    {
        // return view('admin.customers.show')->with('customer', $customer_service->getById($id));
    }
}