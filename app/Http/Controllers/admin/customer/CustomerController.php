<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;

use App\Imports\AddNewAgentImport;
use App\Models\AgentAccountCode;
use App\Models\SmsPool;
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
    public function index(Request $request, CustomerService $customerService, SmsPool $smsPool)
    {
        $current_auth = $request->user();
        if ($smsPool->first()) {
            return redirect("/admin/pool?GROUP");
        }
        return view('admin.customers.index')->with('customers', $customerService->index(10, $current_auth));
    }

    public function edit($id, CustomerService $customerService)
    {
        $customer = Customer::with('employeeInfo', 'agentInfo', 'accountCodes')->find($id);
        if ($customer->app_customer_type == "EMPLOYEE") {
            return view('admin.customers.edit.emp')->with('customer', $customer);
        }
        if ($customer->app_customer_type == "AGENT") {
            return view('admin.customers.edit.agent')->with('customer', $customer);
        }
        return "Only Allow EMPLOYEE and AGENT Type  ";
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
    function filter(Request $request, CustomerService $customerService)
    {
        return $request->all();
    }
    function import(Request $request, CustomerService $customerService)
    {
        // return $request->all();
        return "<h1>Developing</h1>";
    }
    public function searchByPhone(Request $request, CustomerService $customerService)
    {
        $customers = $customerService->getAllCustomerByPhone($request->phone);
        return view('admin.customers.index')->with('customers', $customers);
    }
    public function getCustomersListByPolicy(Request $request, CustomerService $customerService)
    {
        $request->validate(['policy_no' => "required"]);
        // return $customerService->getCustomersListByPolicy($request->policy_no);
        return view('admin.customers.group_customer.customers_List_by_policy')->with(
            [
                'customers' => $customerService->getCustomersListByPolicy($request->policy_no),
                'ayaSompoToken' => 'Bearer ' . Cache::get('token_for_internal'),
                'laraBaseUrl' => url('/'),
                'ayaSompoBaserUrl' => config('app.ayasompo_base_url'),
            ]
        );
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

    function addNewAgentUser(Request $request)
    {
        $status = Excel::import(new AddNewAgentImport, $request->add_agent_user_file);
        return $status ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }

    function updateAgent($id, Request $request, CustomerService $customerService)
    {
        $status = $customerService->updateForAgent($id, $request);
        return $status ?
            back()->with("success", "Success") :
            back() > with("fail", "Fail");
    }

    function deleteAgentCode($id, CustomerService $customerService)
    {
        $status = $customerService->deleteAgentCode($id);
        return $status ?
            back()->with("success", "Success") :
            back() > with("fail", "Fail");
    }
    function updateAgetCode($id, Request $request, AgentAccountCode $repo)
    {
        $status = $repo->find($id)->update($request->only('code'));
        return $status ?
            back()->with("success", "Success") :
            back() > with("fail", "Fail");
    }
    function newAgentCode(Request $request, AgentAccountCode $customer)
    {
        $request->validate(['customer_id' => "required", "code" => 'required']);
        $input = $request->only("customer_id", 'code');
        $status = $customer->create($input);
        return $status ?
            back()->with("success", "Success") :
            back() > with("fail", "Fail");
    }

    function pool()
    {
        return view('admin.customers.pool')->with('pool', SmsPool::orderByDesc("id")->get());
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

    public function resolve(Request $request, CustomerService $customerService, SmsPool $smsPool)
    {
        if ($request->is_sended_sms != 1) {
            $smsApiStatus = $customerService->callSMSAPI($request->phone, $request->content);
            if ($smsApiStatus) {
                $smsPool->find($request->id)->update(['is_sended_sms' => 1]);
            }
        }
        $circleApiStatus = $customerService->callToCirlce($request->phone);

        if ($request->is_sended_sms != 1 && !$circleApiStatus) {
            return $this->errorResponse("Fail", 500);
        } else {
            $smsPool->destroy($request->id);
            $data = $smsPool->all();
            return $this->successResponse("Success", $data, 200);
        }
    }

}





