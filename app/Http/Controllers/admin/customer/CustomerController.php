<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;


use App\Services\customer\CustomerService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Log;


class CustomerController extends Controller
{

    use ApiResponser;
    public function index(CustomerService $customerService)
    {
        return view('admin.customers.index')->with('customers', $customerService->index(10));
    }

    public function getCustomersListByPolicy(Request $request, CustomerService $customerService)
    {
        $request->validate(['policy_no' => "required"]);
        return view('admin.customers.group_customer.customers_List_by_policy')->with(
            [
                'customers' => $customerService->getCustomersListByPolicy($request->policy_no),
                'tokens' => 'Bearer ' . Cache::get('token_for_internal'),
            ]
        );
    }


    //Ajax Response
    public function registerGroupCustomer(Request $request, CustomerService $customerService)
    {
        Log::info($request->all());
        return $this->successResponse("Request Success", $request->all(), 200);
        //return $customerService->registerGroupCustomer($request);
    }
}

