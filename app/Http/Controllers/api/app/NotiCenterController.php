<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Repositories\MessagingRepository;
use App\Traits\api\ApiResponser;
use App\Http\Resources\api\app\PromotionAndSystemNotiRsource;

class NotiCenterController extends Controller
{
    use ApiResponser;
    function getPromotionAndSystem()
    {
        $message = MessagingRepository::getPromotionAndSystemNoti();
        return $this->successResponse("Promotion & System Noti", PromotionAndSystemNotiRsource::collection($message)->groupBy("noti_for"), 200);
    }
}