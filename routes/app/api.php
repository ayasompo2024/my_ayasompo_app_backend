<?php

use App\Http\Controllers\api\app\ProductController;
use App\Http\Controllers\api\app\BannerController;
use App\Http\Controllers\api\app\RequestFormController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('products', [ProductController::class, 'getActive']);
    Route::get('banners', [BannerController::class, 'getActive']);

    // Route::middleware('auth:api_internal')->prefix('v1')->group(function () {
    Route::post('request-form/get-endorsement-form', [RequestFormController::class, 'getEndorsementForm']);
    Route::post('request-form/store-inquiry-case', [RequestFormController::class, 'storeInquiryCase']);

    // });

});


