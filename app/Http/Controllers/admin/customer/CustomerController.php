<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AddNewEmployeeImport;
use App\Services\customer\CustomerService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Customer;

class CustomerController extends Controller
{

    use ApiResponser;
    public function index(Request $request, CustomerService $customerService)
    {
        $current_auth = $request->user();
        return view('admin.customers.index')->with('customers', $customerService->index(10, $current_auth));
    }

    public function edit($id, CustomerService $customerService)
    {
        $customer = Customer::with('employeeInfo')->find($id);

        if ($customer->app_customer_type == "EMPLOYEE") {
            return view('admin.customers.edit.emp')->with('customer', $customer);
        }
        return "<h1>coming Soon</h1>";
    }
    public function update($id, Request $request, CustomerService $customerService)
    {
        $status = $customerService->update($id, $request);
        return $status ?
            back()->with("success", "Success") :
            back() > with("fail", "Fail");
    }
    function filterByType($type, CustomerService $customerService)
    {
        return view('admin.customers.index')->with('customers', $customerService->filterByType($type, 10));
    }
    public function searchByPhone(Request $request, CustomerService $customerService)
    {
        $customers = $customerService->getAllCustomerByPhone($request->phone);
        return view('admin.customers.index')->with('customers', $customers);
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
        $status = $customerService->previewBeforeResgister($request);
        return $status ?
            $this->successResponse("Request Success", $status, 200) :
            $this->errorResponse("Fail", 500);
    }
    //Ajax Response
    public function register(Request $request, CustomerService $customerService)
    {
        $status = $customerService->register($request);
        return $status ?
            $this->successResponse("Request Success", $status, 200) :
            $this->errorResponse("Fail", 500);

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

    public function addNewEmployeeUser(Request $request)
    {
        $status = Excel::import(new AddNewEmployeeImport, $request->add_employee_user_file);
        return $status ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }
}





