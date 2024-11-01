<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;
use App\Imports\AddNewEmployeeImport;
use App\Models\Customer;
use App\Models\SmsPool;
use App\Services\customer\CustomerService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    use Agent, ApiResponser, Pool, RiskLevelUser;

    public function index(Request $request, CustomerService $customerService, SmsPool $smsPool)
    {
        $current_auth = $request->user();
        if ($smsPool->first()) {
            return redirect('/admin/pool');
        }

        return view('admin.customers.index')->with('customers', $customerService->index(10, $current_auth));
    }

    public function edit($id, CustomerService $customerService)
    {
        $customer = Customer::with('employeeInfo', 'agentInfo', 'accountCodes')->find($id);
        if ($customer->app_customer_type == 'EMPLOYEE') {
            return view('admin.customers.edit.emp')->with('customer', $customer);
        }
        if ($customer->app_customer_type == 'AGENT') {
            return view('admin.customers.edit.agent')->with('customer', $customer);
        }
        if ($customer->app_customer_type == 'GROUP') {
            return view('admin.customers.edit.group')->with('customer', $customer);
        }

        return 'Only Allow EMPLOYEE ,AGENT and GROUP Type';
    }

    public function update($id, Request $request, CustomerService $customerService)
    {
        $status = $customerService->update($id, $request);

        return $status ?
            back()->with('success', 'Success') :
            back() > with('fail', 'Fail');
    }

    public function filterByType($type, CustomerService $customerService)
    {
        return view('admin.customers.index')->with('customers', $customerService->filterByType($type, 10));
    }

    public function filter(Request $request, CustomerService $customerService)
    {
        return $request->all();
    }

    public function searchByPhone(Request $request, CustomerService $customerService)
    {
        $term = $request->phone;
        $customers = Customer::query()
            ->where('customer_phoneno', 'LIKE', "%{$term}%")
            ->orWhere('customer_code', 'LIKE', "%{$term}%")
            ->orWhere('user_name', 'LIKE', "%{$term}%")
            ->orWhere('policy_number', 'LIKE', "%{$term}%")
            ->paginate();

        return view('admin.customers.index')->with('customers', $customers);
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
        $this->deleteSms($id);
        $status = $customerService->destroy($id);

        return $status ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }

    private function deleteSms($c_id)
    {
        $customer = Customer::find($c_id);
        if (! $customer) {
            return;
        }
        $smsQuery = SmsPool::where('phone', $customer->customer_phoneno);

        if ($customer->app_customer_type == 'EMPLOYEE') {
            $smsQuery->where('key', 'EMPLOYEE');
        }
        if ($customer->app_customer_type == 'AGENT') {
            $smsQuery->where('key', 'AGENT');
        }
        if ($customer->app_customer_type == 'GROUP') {
            $smsQuery->where('key', 'GROUP');
        }
        $smsQuery->delete();
    }

    public function addNewEmployeeUser(Request $request)
    {
        $request->validate(['add_employee_user_file' => 'required|mimes:xlsx,csv']);
        $status = Excel::import(new AddNewEmployeeImport, $request->add_employee_user_file);

        return $status ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }

    public function import(Request $request) {}
}
