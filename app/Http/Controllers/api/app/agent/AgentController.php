<?php

namespace App\Http\Controllers\api\app\agent;

use App\Http\Controllers\api\app\agent\filter\FilterForClaim;
use App\Http\Controllers\api\app\agent\filter\FilterForRenewal;
use App\Http\Controllers\api\app\agent\response\FormatDataForResponse;
use App\Http\Controllers\api\app\agent\response\LeaderBoardResponse;
use App\Http\Controllers\api\app\agent\response\NotiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\app\agent\AgentListResource;
use App\Http\Resources\api\app\CustomerRsource;
use App\Models\AgentAccountCode;
use App\Models\AgentNoti;
use App\Models\Customer;
use App\Models\LeaderBoard;
use App\Models\TrainingResource;
use App\Traits\api\ApiResponser;
use App\Traits\WriteLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AgentController extends Controller
{
    use ApiResponser,
        PrepareQuery,
        FilterForRenewal,
        FilterForClaim,
        LeaderBoardResponse,
        FormatDataForResponse,
        NotiResponse,
        WriteLogger;

    function renewal(Request $request)
    {
        $agent = $this->getCurrentAuthAgent($request->user());
        $agent_account_codes = $this->getAgentAccountCodeByCustomerID($agent);
        $account_code_string = $this->agentAccountCodesAsStringFormat($agent_account_codes);

        $renewal_query = $this->prepareRenewalQuery($account_code_string, $request->from_date, $request->to_date);
        $this->writeLog('agent_query', 'renewal_query', $renewal_query, true);
        $query_result = $this->runQuery($renewal_query);
        $this->writeLog('agent_query', 'renewal_query_result', $query_result, false);

        $renewed_filter = $this->filterRenewed($query_result);
        $remain_filter = $this->filterRemaining($query_result);
        return $this->formatForRenewal($renewed_filter, $remain_filter, $request->from_date, $request->to_date);
    }
    function claim(Request $request)
    {
        $agent = $this->getCurrentAuthAgent($request->user());
        $agent_account_codes = $this->getAgentAccountCodeByCustomerID($agent);
        $account_code_string = $this->agentAccountCodesAsStringFormat($agent_account_codes);

        $claim_query = $this->prepareClaimQuery($account_code_string, $request->from_date, $request->to_date);
        $this->writeLog('agent_query', 'claim_query', $claim_query, true);
        $query_result = $this->runQuery($claim_query);
        $this->writeLog('agent_query', 'claim_query_result', $query_result, false);

        $paid = $this->paid($query_result);
        $open = $this->open($query_result);
        $outstanding = $this->outstanding($query_result);
        $closed = $this->closed($query_result);
        return $this->formatForClaim($paid, $open, $outstanding, $closed, $request->from_date, $request->to_date);
    }
    function noti(Request $request, AgentNoti $agentNoti)
    {
        $agent = $this->getCurrentAuthAgent($request->user());
        $notis = $agentNoti->select('title', 'message', 'type', 'image', 'is_read', 'id')->where("customer_id", $agent->id)->get();
        return $this->noitResponse($notis);
    }
    function readNoti($id, Request $request, AgentNoti $agentNoti)
    {
        $status = $agentNoti->find($id)->update(['is_read' => 1]);
        return $status ? response()->json(['message' => "Success", 'status' => 200]) : response()->json(['message' => "Fail", 'status' => 500]);
    }
    function leaderBoard(Request $request)
    {
        $agent = $this->getCurrentAuthAgent($request->user());
        $leaders = LeaderBoard::select('campaign_title', 'name', 'points', 'phone', 'customer_id')->with('profile:id,profile_photo')->orderByDesc("points")->get();
        return $this->leaderBoardRes($leaders, $agent);
    }
    function trainingResource(Request $request, TrainingResource $trainingResource)
    {
        $tr = $trainingResource->select('title', 'file', 'description')->where("status", 1)->orderByDesc("sort")->get();
        return $tr ? response()->json(['message' => "Success", 'status' => 200, 'data' => $tr]) : response()->json(['message' => "Fail", 'status' => 500]);
    }
    function profile(Request $request, Customer $customer)
    {
        $current_agent = $customer->with('agentInfo')->where('customer_phoneno', $request->user()->customer_phoneno)->where('app_customer_type', 'AGENT')->first();
        return $this->successResponse("Here is current agent profile", new CustomerRsource($current_agent), 200);
    }

    function getAllAgentProfile(Request $request, Customer $customer)
    {
        $agents = $customer->with('agentInfo','accountCodes:customer_id,code')->where('app_customer_type', 'AGENT')->get();
        return $this->successResponse("All Agents Profile List", AgentListResource::collection($agents), 200);
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
            $results = DB::connection('oracle')->select($sqlquery);
            return json_decode(json_encode($results), true);
        }
    }
}