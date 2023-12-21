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
                'ayaSompoToken' => 'Bearer ' . Cache::get('token_for_internal'),
                'laraBaseUrl' => url('/'),
                'ayaSompoBaserUrl' => config('app.ayasompo_base_url'),
            ]
        );
    }
    //Ajax Response
    public function previewBeforeResgister(Request $request, CustomerService $customerService)
    {
        // \Log::info($request);
        $status = $customerService->previewBeforeResgister($request);
        return $status ?
            $this->successResponse("Request Success", $status, 200) :
            $this->errorResponse("Fail", 500);
    }
    //Ajax Response
    public function register(Request $request, CustomerService $customerService)
    {
        // \Log::info($request);
        $status = $customerService->register($request);
        return $status ?
            $this->successResponse("Request Success", $status, 200) :
            $this->errorResponse("Fail", 500);

    }

    public function searchByPhone(Request $request, CustomerService $customerService)
    {
        return view('admin.customers.index')->with('customers', $customerService->getAllCustomerByPhone($request->phone));
    }

    public function toggleDisabled($id, CustomerService $customerService)
    {
        $status = $customerService->toggleDisabledById($id);
        return $status ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }
    public function destroy($id, CustomerService $customerService)
    {
        $status = $customerService->destroy($id);
        return $status ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }
}





