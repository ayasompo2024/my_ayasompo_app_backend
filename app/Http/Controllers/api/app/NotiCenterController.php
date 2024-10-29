<?php

namespace App\Http\Controllers\api\app;

use App\Enums\NotiFor;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\app\PromotionAndSystemNotiRsource;
use App\Http\Resources\api\app\ServiceRequestNotiRsource;
use App\Models\Messaging;
use App\Repositories\MessagingRepository;
use App\Repositories\RequestFormRepository;
use App\Traits\api\ApiResponser;
use Exception;
use Illuminate\Http\Request;

class NotiCenterController extends Controller
{
    use ApiResponser;

    public function getPromotionAndSystem($user_id, Request $request)
    {
        try {
            $messages = Messaging::where(["customer_id" => $user_id])->get()->groupBy("noti_for");
            return $this->successResponse('Promotion & System Noti', $messages, 200);
        } catch(Exception $e) {
            throw $e;
        }

        // $message = MessagingRepository::getPromotionAndSystemNoti();
        // $notiCenter = PromotionAndSystemNotiRsource::collection($message)->groupBy('noti_for');
        // $notiCenter[NotiFor::TRANSACTION->value] = $this->getTransactionNoti($user_id);

        // return $this->successResponse('Promotion & System Noti', $notiCenter, 200);
    }

    private function getTransactionNoti($user_id)
    {
        $reqFrom = RequestFormRepository::getByAppCustomerID($user_id);
        if (count($reqFrom) == 0) {
            return [$this->addFakeIfNotExistServiceRequest($user_id)];
        } else {
            return ServiceRequestNotiRsource::collection($reqFrom);
        }
    }

    private function addFakeIfNotExistServiceRequest($customer_id)
    {
        return [
            'id' => 0,
            'noti_for' => NotiFor::TRANSACTION->value,
            'title' => 'Title Your Service Requests will be populated here',
            'message' => '',
            'customer_id' => $customer_id,
            'description' => null,
            'image_url' => null,
            'created_at' => 'On App Launch',
            'caseid' => '',
            'ayasompo_risksequenceno' => '',
            'ayasompo_policyno' => '',
            'ayasompo_casenumber' => '',
            'incidentid' => '',
            'inquiry_status' => '',
            'is_read' => 0,
        ];
    }
}
