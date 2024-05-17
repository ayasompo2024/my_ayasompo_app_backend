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
    use ApiResponser, PrepareQuery, FormatDataForResponse;

    function renewal(Request $request)
    {
        $agent = $this->getCurrentAuthAgent($request->user());
        $agent_account_codes = $this->getAgentAccountCodeByCustomerID($agent);
        $account_code_string = $this->agentAccountCodesAsStringFormat($agent_account_codes);
        $renewal_query = $this->prepareRenewalQuery($account_code_string, $request->from_date, $request->to_date);
        $query_result = $this->runQuery($renewal_query);
        return $this->formatForRenewal($query_result);
    }
    function claim(Request $request)
    {
        $agent = $this->getCurrentAuthAgent($request->user());
        $agent_account_codes = $this->getAgentAccountCodeByCustomerID($agent);
        $account_code_string = $this->agentAccountCodesAsStringFormat($agent_account_codes);
        $claim_query = $this->prepareClaimQuery($account_code_string, $request->from_date, $request->to_date);
        $query_result = $this->runQuery($claim_query);
        return $this->formatForRenewal($query_result);
    }
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
    private function runQuery($sqlquery)
    {
        if (config('app.stage') == 'UAT') {
            $url = "https://myayasompo.ayasompo.com/dev/a4b7b3e3-0f5a-4fcb-9a7e-60ab3a8d2e89/run-agent-query/" . $sqlquery;
            $response = Http::withOptions(['verify' => false])->get($url);
            return $response->json();

        } else {
            return DB::connection('oracle')->select($sqlquery);
        }
    }
}