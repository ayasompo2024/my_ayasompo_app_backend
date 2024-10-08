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
    public $collection;

    public $from;

    public $to;

    public $query;

    use ClaimQuery;
    use Common;

    //use FilterForRenewal, FilterForClaim;
    use LeaderBoardResponse, MonthlySaleResponse, QuarterlyResponse, SaleDashboardResponse, SaleTargetMessage, WriteLogger;
    use PrepareQuery;
    use RenewalQuery;

    public function renewal($req)
    {
        $account_code_string = $this->getAccountCode($req->user());

        $remaining_query = $this->remainingQuery($account_code_string, $req->from_date, $req->to_date);
        $remaining_result = $this->runQuery($remaining_query);

        $renewed_query = $this->renewedQuery($account_code_string, $req->from_date, $req->to_date);
        $renewed_result = $this->runQuery($renewed_query);

        return [
            'renewed' => $renewed_result,
            'remain' => $remaining_result,
            'query' => [
                'remaining_query' => $remaining_query,
                'renewed_query' => $renewed_query,
            ],
        ];
    }

    public function claim($req)
    {
        $account_code_string = $this->getAccountCode($req->user());

        $close_query = $this->closeQuery($account_code_string, $req->from_date, $req->to_date);
        $close_result = $this->runQuery($close_query);

        $outstanding_query = $this->outstandingQuery($account_code_string, $req->from_date, $req->to_date);
        $outstanding_result = $this->runQuery($outstanding_query);

        $paid_query = $this->paidQuery($account_code_string, $req->from_date, $req->to_date);
        $paid_result = $this->runQuery($paid_query);

        return [
            'query' => [
                'close_query' => $close_query,
                'outstanding_query' => $outstanding_query,
                'paid_query' => $paid_query,
            ],
            'count' => [
                'paid' => count($paid_result),
                'close' => count($close_result),
                'outstanding' => count($outstanding_result),
            ],
            'paid' => $paid_result,
            'closed' => $close_result,
            'outstanding' => $outstanding_result,
            'open' => $outstanding_result,
        ];
    }

    public function monthlySale($req)
    {
        $account_code_string = $this->getAccountCode($req->user());
        $query = $this->prepareMonthlySaleQuery($account_code_string, $req->from_date, $req->to_date);
        $this->writeLog('agent_query', 'monthlySale', $query, true);
        $result = $this->runQuery($query);

        return $this->monthlySaleResponse($result, $req);
    }

    public function quarterly($w)
    {
        $account_code_string = $this->getAccountCode($w->user());
        $query = $this->prepareQuarterlySaleQuery($account_code_string, $w->year);
        $this->writeLog('agent_query', 'quarterly', $query, true);
        $result = $this->runQuery($query);

        return $this->quarterlyResponse($result, $w->year);
    }

    public function dashboard($req)
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
        $this->writeLog('agent_query', 'dashboard', $query, false);
        $result = $this->runQuery($query);
        $this->query = $query;
        $this->collection = collect($result);

        return $this->saleDashboardResponse($from, $to);
    }

    public function leaderBoard($req, $leaderBoard)
    {
        $leaderBoard = $leaderBoard->select('campaign_title', 'name', 'points', 'phone', 'customer_id', 'product_code', 'period_from', 'period_to')->with('profile:id,profile_photo')->orderByDesc('points')->get();
        $account_code_string = $this->getAccountCode($req->user());
        $query = $this->prepareAgentPointQuery($account_code_string, $leaderBoard[0]);
        $result = $this->runQuery($query);
        $this->collection = collect($result);

        return $this->leaderBoardRes($leaderBoard, $req->show_raw_data);
    }
}
