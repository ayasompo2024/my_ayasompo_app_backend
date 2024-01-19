<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Repositories\MessagingRepository;
use App\Repositories\RequestFormRepository;
use App\Traits\api\ApiResponser;
use App\Http\Resources\api\app\PromotionAndSystemNotiRsource;
use App\Http\Resources\api\app\ServiceRequestNotiRsource;
use App\Enums\NotiFor;
use Illuminate\Http\Request;

class NotiCenterController extends Controller
{
    use ApiResponser;
    function getPromotionAndSystem(Request $request)
    {
        $message = MessagingRepository::getPromotionAndSystemNoti();
        $notiCenter = PromotionAndSystemNotiRsource::collection($message)->groupBy("noti_for");
        $notiCenter[NotiFor::TRANSACTION->value] = ServiceRequestNotiRsource::collection(RequestFormRepository::getByAppCustomerID($request->user()->id));
        return $this->successResponse("Promotion & System Noti", $notiCenter, 200);
    }
}
