<?php

namespace App\Http\Controllers\api\internal;

use App\Http\Controllers\Controller;
use App\Models\AgentNoti;
use App\Models\Customer;
use App\Services\FirebaseService;
use App\Traits\api\ApiResponser;
use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\SendPushNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Log;

class AgentController extends Controller
{
    use ApiResponser, RemoveInitialPlusNineFiveNine, SendPushNotification;

    public function sendNoti(Request $request, FirebaseService $firebase)
    {
        $validator = $this->validationForSendAgentNoti($request);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }

        $agent_profile = Customer::where('app_customer_type', 'AGENT')->where('customer_phoneno', $this->removeInitialPlusNineFiveNine($request->phone))->first();

        if ($agent_profile) {
            $request['customer_id'] = $agent_profile->id;
            $content = $this->getContent($request);

            try {
                $firebase->sendNotification($agent_profile->device_token, $content['title'], $content['body'], null, $content);
            } catch (Exception $e) {
                Log::info($e);
            }

            // $this->sendAsUnicast($agent_profile->device_token, $content, $content, 'agent');
            $status = $this->saveNoti($request->only('customer_id', 'title', 'message', 'type'));

            return $status ?
                $this->successResponse('Your request has been processed (Agent Noti)', [], 200) :
                $this->errorResponse('Fail', 500);
        } else {
            return $this->errorResponse('Agent profile not found', 500);
        }
    }

    private function validationForSendAgentNoti($request)
    {
        return Validator::make($request->all(), [
            'phone' => ['required', 'min:6', 'max:13'],
            'title' => 'required',
            'message' => 'required',
            'type' => [
                'required',
                Rule::in(['sales_target', 'renewal', 'campaign_promotion', 'customer_birthday']),
            ],
        ]);
    }

    private function saveNoti($row)
    {
        $row['noti_received_date'] = now();

        return AgentNoti::create($row);
    }

    private function getContent($request)
    {
        return [
            'title' => $request->title,
            'body' => $request->message,
        ];
    }
}
