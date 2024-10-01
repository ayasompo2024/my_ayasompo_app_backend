<?php

use App\Http\Controllers\api\app\AppGoJoyController;
use App\Http\Controllers\api\app\BannerController;
use App\Http\Controllers\api\app\ClaimcaseController;
use App\Http\Controllers\api\app\LocationMapController;
use App\Http\Controllers\api\app\NotiCenterController;
use App\Http\Controllers\api\app\ProductController;
use App\Http\Controllers\api\app\RequestFormController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('message', action: [NotiCenterController::class, 'sendNotificatioin']);
    Route::get('products', [ProductController::class, 'getActive']);
    Route::get('banners', [BannerController::class, 'getActive']);
    Route::get('banners/splash', [BannerController::class, 'getSplashActive']);
    Route::get('location-maps', [LocationMapController::class, 'getActive']);
    Route::post('request-form/store-guest-inquiry-case', [RequestFormController::class, 'storeInquiryCase']);

    Route::middleware('auth:api')->group(function () {
        Route::post('request-form/get-endorsement-form', [RequestFormController::class, 'getEndorsementForm']);
        Route::post('request-form/store-inquiry-case', [RequestFormController::class, 'storeInquiryCase']);
        Route::put('request-form/read/{id}', [RequestFormController::class, 'read']);

        Route::post('claim-case/motor', [ClaimcaseController::class, 'motorCase']);
        Route::post('claim-case/non-motor', [ClaimcaseController::class, 'nonMotorCase']);

        Route::get('noti/get-promotion-and-system/{user_id}', [NotiCenterController::class, 'getPromotionAndSystem']);

        Route::group(['prefix' => 'go-joy'], function () {
            Route::get('/', [AppGoJoyController::class, 'index']);
            Route::post('/', [AppGoJoyController::class, 'store']);
            Route::get('/{id}', action: [AppGoJoyController::class, 'show']);
            Route::put('/{id}', [AppGoJoyController::class, 'update']);
        });
    });
});
