<?php

namespace App\Http\Controllers\admin\customer;

use App\Services\customer\CustomerService;
use Illuminate\Http\Request;
use App\Imports\AddNewAgentImport;
use App\Models\AgentAccountCode;
use Maatwebsite\Excel\Facades\Excel;
trait Agent
{
    function addNewAgentUser(Request $request)
    {
        $request->validate(['add_agent_user_file' => 'required|mimes:xlsx,csv']);
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
}