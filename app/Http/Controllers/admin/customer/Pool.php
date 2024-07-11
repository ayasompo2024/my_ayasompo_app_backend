<?php

namespace App\Http\Controllers\admin\customer;

use App\Repositories\CustomerRepository;
use App\Services\customer\CustomerService;
use Illuminate\Http\Request;
use App\Models\SmsPool;


trait Pool
{
    function pool(Request $req)
    {
        $role = $req->user()->role;

        if ($role == 'Root')
            $pool = SmsPool::all();

        if ($role == 'HR')
            $pool = SmsPool::where("key", "EMPLOYEE")->get();

        if ($role == 'Admin')
            $pool = SmsPool::where("key", "EMPLOYEE")->get();

        if ($role == 'Agent')
            $pool = SmsPool::where("key", "AGENT")->get();

        if ($role == 'Corporate')
            $pool = SmsPool::where("key", "GROUP")->orWhere('key', 'CORPORATE')->get();

        $pool = $pool->groupBy('key');

        return view('admin.customers.pool')->with('pool', $pool);
    }
    public function resolve(Request $request, CustomerService $customerService, SmsPool $smsPool)
    {
        if ($request->is_sended_sms != 1) {
            $smsApiStatus = $customerService->callSMSAPI($request->phone, $request->content);
            if ($smsApiStatus) {
                $smsPool->find($request->id)->update(['is_sended_sms' => 1]);
            }
        }
        if ($request->is_sended_sms == 1 && $request->key != 'GROUP') {
            $smsPool->destroy($request->id);
            $data = $smsPool->all();
            return $this->successResponse("Success", $data, 200);
        }
        if ($request->key == 'GROUP') {
            $circleApiStatus = $customerService->callToCirlceS($request->phone, $request->name, $request->key);
            if ($request->is_sended_sms != 1 && !$circleApiStatus) {
                return $this->errorResponse("Fail", 500);
            } else {
                $smsPool->destroy($request->id);
                $data = $smsPool->all();
                return $this->successResponse("Success", $data, 200);
            }
        }
        return $this->successResponse("Success", [], 200);
    }
}