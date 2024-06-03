<?php
namespace App\Services\api\app\agent;

use App\Http\Controllers\api\app\agent\filter\FilterForClaim;
use App\Http\Controllers\api\app\agent\filter\FilterForRenewal;
use App\Services\api\app\agent\response\MonthlySaleResponse;
use App\Services\api\app\agent\response\QuarterlyResponse;

class AgentService
{
    use Common;
    use PrepareQuery;
    use FilterForRenewal, FilterForClaim;
    use SaleTargetMessage, QuarterlyResponse, MonthlySaleResponse;
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
        return $this->monthlySaleResponse($result, $req);
    }
    function quarterly($w)
    {
        $account_code_string = $this->getAccountCode($w->user());
        $query = $this->prepareQuarterlySaleQuery($account_code_string, $w->year);
        $result = $this->runQuery($query);
        return $this->quarterlyResponse($result,$w->year);
    }
}