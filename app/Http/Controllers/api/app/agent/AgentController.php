<?php

namespace App\Http\Controllers\api\app\agent;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\app\CustomerRsource;
use App\Models\AgentAccountCode;
use App\Models\Customer;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AgentController extends Controller
{
    use ApiResponser;
    use PrepareQuery;
    function profile(Request $request, Customer $customer)
    {
        $current_agent = $customer->with('agentInfo')->where('customer_phoneno', $request->user()->customer_phoneno)->where('app_customer_type', 'AGENT')->first();
        return $this->successResponse("Here is current agent profile", new CustomerRsource($current_agent), 200);
    }
    private function getAgentAccountCodeByCustomerID($profile)
    {
        return AgentAccountCode::select('customer_id', 'code')->where('customer_id', $profile->id)->get();
    }
    private function getCurrentAuthAgent($user)
    {
        return Customer::select('id', 'customer_code', 'customer_phoneno', 'user_name', 'app_customer_type', 'profile_photo')->where('customer_phoneno', $user->customer_phoneno)->where('app_customer_type', 'AGENT')->first();
    }
    private function agentAccountCodesAsStringFormat($agent_account_code_array)
    {
        $collection = collect($agent_account_code_array);
        $concatenatedCodes = $collection->pluck('code')->implode("','");
        $concatenatedCodes = "'" . $concatenatedCodes . "'";
        return $concatenatedCodes;
    }
    function renewal(Request $request)
    {
        $agent = $this->getCurrentAuthAgent($request->user());
        $agent_account_codes = $this->getAgentAccountCodeByCustomerID($agent);
        $account_code_string = $this->agentAccountCodesAsStringFormat($agent_account_codes);
        return $this->prepareRenewalQuery($account_code_string, $request->from_date, $request->to_date);
        // return $this->testQuery($this->prepareRenewalQuery($account_code_string));
    }
    private function runQuery($sqlquery)
    {
        $resutl = DB::connection('oracle')->select($sqlquery);
        return $resutl;
    }
    private function testQuery($sqlquery)
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'X-CSRF-TOKEN' => csrf_token(), // Get the CSRF token
        ];
        $response = Http::withHeaders($headers)->withOptions(['verify' => false])->post("https://myayasompo.ayasompo.com/dev/run-agent-query", ["sqlquery" => $sqlquery]);
        return $response->json();
    }
}





