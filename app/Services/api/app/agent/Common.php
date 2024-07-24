<?php

namespace App\Services\api\app\agent;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\AgentAccountCode;
use App\Models\Customer;

trait Common
{
    function getAccountCode($user)
    {
        $agent = $this->getCurrentAuthAgent($user);
        $agent_account_codes = $this->getAgentAccountCodeByCustomerID($agent);
        return $this->agentAccountCodesAsStringFormat($agent_account_codes);
    }
    function getAgentAccountCodeByCustomerID($profile)
    {
        return AgentAccountCode::select('customer_id', 'code')->where('customer_id', $profile->id)->get();
    }
    function getCurrentAuthAgent($user)
    {
        return Customer::select('id', 'customer_code', 'customer_phoneno', 'user_name', 'app_customer_type', 'profile_photo')->where('customer_phoneno', $user->customer_phoneno)->where('app_customer_type', 'AGENT')->first();
    }
    function agentAccountCodesAsStringFormat($agent_account_code_array)
    {
        $collection = collect($agent_account_code_array);
        $concatenatedCodes = $collection->pluck('code')->implode("','");
        $concatenatedCodes = "'" . $concatenatedCodes . "'";
        return $concatenatedCodes;
    }
    function runQuery($sqlquery)
    {
        set_time_limit(300); //
        if (config('app.stage') == 'UAT') {
            $url = "https://myayasompo.ayasompo.com/dev/a4b7b3e3-0f5a-4fcb-9a7e-60ab3a8d2e89/run-agent-query/" . $sqlquery;
            $response = Http::withOptions(['verify' => false])->get($url);
            return $response->json();

        } else {
            $results = DB::connection('oracle')->select($sqlquery);
            return json_decode(json_encode($results), true);
        }
    }
}