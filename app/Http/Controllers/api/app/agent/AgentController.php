<?php

namespace App\Http\Controllers\api\app\agent;

use App\Http\Controllers\api\app\agent\response\FormatDataForResponse;
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
        FormatDataForResponse,
        NotiResponse;

    public function renewal(Request $request, AgentService $agentService)
    {
        $renewal = $agentService->renewal($request);

        return $this->formatForRenewal($renewal['renewed'], $renewal['remain'], $request->from_date, $request->to_date, $renewal['query']);
    }

    public function claim(Request $request, AgentService $agentService)
    {
        $claim = $agentService->claim($request);

        return $this->formatForClaim(
            $claim['paid'],
            $claim['outstanding'],
            $claim['outstanding'],
            $claim['closed'],
            $request->from_date,
            $request->to_date,
            $claim['query']
        );
    }

    public function monthlySale(Request $request, AgentService $agentService)
    {
        $monthlySale = $agentService->monthlySale($request);

        return $monthlySale;
    }

    public function quarterlySale(Request $w, AgentService $agentService)
    {
        return $agentService->quarterly($w);
    }

    public function dashboard(Request $w, AgentService $agentService)
    {
        return $agentService->dashboard($w);
    }

    public function noti(Request $request, AgentNoti $agentNoti, AgentService $agentService)
    {
        $agent = $agentService->getCurrentAuthAgent($request->user());
        $notis = $agentNoti->select('title', 'message', 'type', 'image', 'is_read', 'id', 'noti_received_date')->where('customer_id', $agent->id)->get();

        return $this->noitResponse($notis);
    }

    public function readNoti($id, Request $request, AgentNoti $agentNoti)
    {
        $status = $agentNoti->find($id)->update(['is_read' => 1]);

        return $status ? response()->json(['message' => 'Success', 'status' => 200]) : response()->json(['message' => 'Fail', 'status' => 500]);
    }

    public function leaderBoard(Request $request, AgentService $agentService, LeaderBoard $leaderBoard)
    {
        return $agentService->leaderBoard($request, $leaderBoard);
    }

    public function trainingResource(Request $request, TrainingResource $trainingResource)
    {
        $tr = $trainingResource->select('title', 'file', 'description')->where('status', 1)->orderByDesc('sort')->get();

        return $tr ? response()->json(['message' => 'Success', 'status' => 200, 'data' => $tr]) : response()->json(['message' => 'Fail', 'status' => 500]);
    }

    public function profile(Request $request, Customer $customer)
    {
        $current_agent = $customer->with('agentInfo')->where('customer_phoneno', $request->user()->customer_phoneno)->where('app_customer_type', 'AGENT')->first();

        return $this->successResponse('Here is current agent profile', new CustomerRsource($current_agent), 200);
    }

    public function getAllAgentProfile(Request $request, Customer $customer)
    {
        $agents = $customer->with('agentInfo', 'accountCodes:customer_id,code')->where('app_customer_type', 'AGENT')->get();

        return $this->successResponse('All Agents Profile List', AgentListResource::collection($agents), 200);
    }
}
