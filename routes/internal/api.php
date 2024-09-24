<?php

use App\Http\Controllers\api\internal\AgentController;
use App\Http\Controllers\api\internal\AuthController;
use App\Http\Controllers\api\internal\CustomerController;
use Illuminate\Support\Facades\Route;

Route::post('v1/get-token', [AuthController::class, 'generateInterAccessToken']);
Route::middleware('auth:api_internal')->prefix('v1')->group(function () {
    Route::post('send-claim-noti', [CustomerController::class, 'sendClaimNoti']);
    Route::post('send-inquiry-noti', [CustomerController::class, 'sendInquiryNoti']);
});

Route::middleware('auth:api_internal')->prefix('v1')->group(function () {
    Route::post('agent/send-noti', [AgentController::class, 'sendNoti']);
});
