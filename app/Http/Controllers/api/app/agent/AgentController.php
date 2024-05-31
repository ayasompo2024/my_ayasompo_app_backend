<?php

namespace App\Http\Controllers\api\app\agent;



use App\Http\Controllers\api\app\agent\response\FormatDataForResponse;
use App\Http\Controllers\api\app\agent\response\LeaderBoardResponse;
use App\Http\Controllers\api\app\agent\response\NotiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\app\agent\AgentListResource;
use App\Http\Resources\api\app\CustomerRsource;
use App\Models\AgentNoti;
use App\Models\Customer;
use App\Models\LeaderBoard;
use App\Models\TrainingResource;
use App\Services\api\app\agent\AgentService;
use App\Traits\api\ApiResponser;

use Illuminate\Http\Request;


class AgentController extends Controller
{
    use ApiResponser,
        LeaderBoardResponse,
        FormatDataForResponse,
        NotiResponse;

    function renewal(Request $request, AgentService $agentService)
    {
        $renewal = $agentService->renewal($request);
        return $this->formatForRenewal($renewal['renewed'], $renewal['remain'], $request->from_date, $request->to_date);
    }

    function claim(Request $request, AgentService $agentService)
    {
        $claim = $agentService->claim($request);
        return $this->formatForClaim(
            $claim['paid'],
            $claim['open'],
            $claim['outstanding'],
            $claim['closed'],
            $request->from_date,
            $request->to_date
        );
    }

    function monthlySale(Request $request, AgentService $agentService)
    {
        $monthlySale = $agentService->monthlySale($request);
        return $monthlySale;
    }

    function noti(Request $request, AgentNoti $agentNoti, AgentService $agentService)
    {
        $agent = $agentService->getCurrentAuthAgent($request->user());
        $notis = $agentNoti->select('title', 'message', 'type', 'image', 'is_read', 'id', 'noti_received_date')->where("customer_id", $agent->id)->get();
        return $this->noitResponse($notis);
    }
    function readNoti($id, Request $request, AgentNoti $agentNoti)
    {
        $status = $agentNoti->find($id)->update(['is_read' => 1]);
        return $status ? response()->json(['message' => "Success", 'status' => 200]) : response()->json(['message' => "Fail", 'status' => 500]);
    }
    function leaderBoard(Request $request, AgentService $agentService, LeaderBoard $leaderBoard)
    {
        $agent = $agentService->getCurrentAuthAgent($request->user());
        $leaders = $leaderBoard->select('campaign_title', 'name', 'points', 'phone', 'customer_id')->with('profile:id,profile_photo')->orderByDesc("points")->get();
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
        $agents = $customer->with('agentInfo', 'accountCodes:customer_id,code')->where('app_customer_type', 'AGENT')->get();
        return $this->successResponse("All Agents Profile List", AgentListResource::collection($agents), 200);
    }
}