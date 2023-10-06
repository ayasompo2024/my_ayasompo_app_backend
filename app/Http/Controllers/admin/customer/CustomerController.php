<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;


class CustomerController extends Controller
{

    public function index(CustomerService $customer_service)
    {
        return view('admin.customers.index')->with('customers', $customer_service->getAll(10));
    }

    public function shopOwners(CustomerService $customer_service)
    {
       // return $customer_service->shopOwners();
    }
    public function show($id, CustomerService $customer_service)
    {
        return view('admin.customers.show')->with('customer', $customer_service->getById($id));
    }
}