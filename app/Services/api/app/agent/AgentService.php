<?php
namespace App\Services\api\app\agent;

use App\Http\Controllers\api\app\agent\filter\FilterForClaim;
use App\Http\Controllers\api\app\agent\PrepareQuery;
use App\Models\AgentAccountCode;
use App\Models\Customer;
use App\Http\Controllers\api\app\agent\filter\FilterForRenewal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class AgentService
{

    use PrepareQuery, FilterForRenewal, FilterForClaim, TierFinder, SaleTargetMessage;
    function renewal($req)
    {
        $account_code_string = $this->getAccountCode($req->user());
        $renewal_query = $this->prepareRenewalQuery($account_code_string, $req->from_date, $req->to_date);
        $query_result = $this->runQuery($renewal_query);
        return [
            "renewed" => $this->filterRenewed($query_result),
            "remain" => $this->filterRemaining($query_result)
        ];
    }

    function claim($req)
    {
        $account_code_string = $this->getAccountCode($req->user());
        $claim_query = $this->prepareClaimQuery($account_code_string, $req->from_date, $req->to_date);
        $query_result = $this->runQuery($claim_query);
        return [
            'paid' => $this->paid($query_result),
            'open' => $this->open($query_result),
            'outstanding' => $this->outstanding($query_result),
            'closed' => $this->closed($query_result)
        ];
    }

    function monthlySale($req)
    {
        $account_code_string = $this->getAccountCode($req->user());
        $query = $this->prepareMonthlySaleQuery($account_code_string, $req->from_date, $req->to_date);
        $result = $this->runQuery($query);
        return $this->monthlySaleRes($result, $req);
    }

    private function monthlySaleRes($row, $req)
    {
        $collection = collect($row);

        if ($req->mock_total_sale_amount)
            $total_sale_amount = $req->mock_total_sale_amount;
        else
            $total_sale_amount = $collection->sum("all_product_gwp");
            
        $tier = $this->getTier($total_sale_amount);
        return [
            "from_date" => $req->from_date,
            "to_date" => $req->to_date ? $req->to_date : $req->from_date,
            "total_sale_amount" => number_format($total_sale_amount) . " MMK",

            "tier" => [
                "name" => $tier['tier_name'],
                "number" => $tier['tier_number'],
                "target_sale_amount" => $tier['tier_target_sale_amount'],
                "target_sale_amount_humna_format" => $tier['tier_target_sale_amount_humna_format'],
                "tier_reach_message" => $tier['tier_reach_message'],
            ],

            'is_unlocked_first_badge' => $this->isUnlockedFirstBadge($total_sale_amount),
            "messages" => $this->getMessages($total_sale_amount),
            "query_res" => $row,
        ];
    }



    private function getAccountCode($user)
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





