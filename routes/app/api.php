<?php

use App\Http\Controllers\api\app\ClaimcaseController;
use App\Http\Controllers\api\app\ProductController;
use App\Http\Controllers\api\app\BannerController;
use App\Http\Controllers\api\app\RequestFormController;
use App\Http\Controllers\api\app\LocationMapController;
use App\Http\Controllers\api\app\NotiCenterController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('products', [ProductController::class, 'getActive']);
    Route::get('banners', [BannerController::class, 'getActive']);
    Route::get('location-maps', [LocationMapController::class, 'getActive']);

    Route::middleware('auth:api')->group(function () {
        Route::post('request-form/get-endorsement-form', [RequestFormController::class, 'getEndorsementForm']);
        Route::post('request-form/store-inquiry-case', [RequestFormController::class, 'storeInquiryCase']);

        Route::post('claim-case/motor', [ClaimcaseController::class, 'motorCase']);
        Route::post('claim-case/non-motor', [ClaimcaseController::class, 'nonMotorCase']);
    });
    Route::get('noti/get-promotion-and-system', [NotiCenterController::class, 'getPromotionAndSystem']);
    
});


