<?php
namespace App\Services\api\app\agent;

use App\Http\Controllers\api\app\agent\filter\FilterForClaim;
use App\Http\Controllers\api\app\agent\filter\FilterForRenewal;
use App\Services\api\app\agent\response\LeaderBoardResponse;
use App\Services\api\app\agent\response\MonthlySaleResponse;
use App\Services\api\app\agent\response\QuarterlyResponse;
use App\Services\api\app\agent\response\SaleDashboardResponse;
use App\Traits\WriteLogger;
use Carbon\Carbon;

class AgentService
{

    public $collection, $from, $to, $query;
    use Common;
    use PrepareQuery;
    use FilterForRenewal, FilterForClaim;
    use SaleTargetMessage, QuarterlyResponse, MonthlySaleResponse, SaleDashboardResponse, LeaderBoardResponse, WriteLogger;
    function renewal($req)
    {
        $account_code_string = $this->getAccountCode($req->user());
        $renewal_query = $this->prepareRenewalQuery($account_code_string, $req->from_date, $req->to_date);
        $this->writeLog("agent_query", "renewal", $renewal_query, true);
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
        $this->writeLog("agent_query", "claim", $claim_query, true);
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
        $this->writeLog("agent_query", "monthlySale", $query, true);
        $result = $this->runQuery($query);
        return $this->monthlySaleResponse($result, $req);
    }
    function quarterly($w)
    {
        $account_code_string = $this->getAccountCode($w->user());
        $query = $this->prepareQuarterlySaleQuery($account_code_string, $w->year);
        $this->writeLog("agent_query", "quarterly", $query, true);
        $result = $this->runQuery($query);
        return $this->quarterlyResponse($result, $w->year);
    }
    function dashboard($req)
    {
        $currentDate = Carbon::now();
        $from = $req->from_date;
        $to = $req->to_date;
        if ($from == null && $to == null) {
            $from = $currentDate->copy()->startOfYear()->format('Y-m-d 00:00:00');
            $to = $currentDate->copy()->endOfYear()->format('Y-m-d 00:00:00');
        }
        if ($from != null && $to == null) {
            $to = $currentDate->copy()->endOfYear()->format('Y-m-d 00:00:00');
        }
        $from = substr($from, 0, 10);
        $to = substr($to, 0, 10);
        $account_code_string = $this->getAccountCode($req->user());
        $query = $this->prepareDashboardQuery($account_code_string, $from, $to);
        $this->writeLog("agent_query", "dashboard", $query, false);
        $result = $this->runQuery($query);
        $this->query = $query;
        $this->collection = collect($result);
        return $this->saleDashboardResponse($from, $to);
    }
    function leaderBoard($req, $leaderBoard)
    {
        $leaderBoard = $leaderBoard->select('campaign_title', 'name', 'points', 'phone', 'customer_id', 'product_code', 'period_from', 'period_to')->with('profile:id,profile_photo')->orderByDesc("points")->get();
        $account_code_string = $this->getAccountCode($req->user());
        $query = $this->prepareAgentPointQuery($account_code_string, $leaderBoard[0]);
        $result = $this->runQuery($query);
        $this->collection = collect($result);
        return $this->leaderBoardRes($leaderBoard, $req->show_raw_data);
    }
}