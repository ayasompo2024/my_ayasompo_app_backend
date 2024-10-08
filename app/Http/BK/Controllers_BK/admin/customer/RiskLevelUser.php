<?php

namespace App\Http\Controllers\admin\customer;

use App\Services\customer\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

trait RiskLevelUser
{
    public function getCustomersListByPolicy(Request $request, CustomerService $customerService)
    {
        $request->validate(['policy_no' => 'required']);

        // return $customerService->getCustomersListByPolicy($request->policy_no);
        return view('admin.customers.group_customer.customers_List_by_policy')->with(
            [
                'customers' => $customerService->getCustomersListByPolicy($request->policy_no),
                'ayaSompoToken' => 'Bearer '.Cache::get('token_for_internal'),
                'laraBaseUrl' => url('/'),
                'ayaSompoBaserUrl' => config('app.ayasompo_base_url'),
            ]
        );
    }

    //Ajax Response
    public function previewBeforeResgister(Request $request, CustomerService $customerService)
    {
        \Log::info($request);
        $status = $customerService->previewBeforeResgister($request);

        return $status ?
            $this->successResponse('Request Success', $status, 200) :
            $this->errorResponse('Fail', 500);
    }

    //Ajax Response
    public function register(Request $request, CustomerService $customerService)
    {
        $status = $customerService->register($request);

        return $status ?
            $this->successResponse('Request Success', $status, 200) :
            $this->errorResponse('Fail', 500);
    }
}
