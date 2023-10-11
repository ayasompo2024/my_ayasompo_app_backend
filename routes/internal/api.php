<?php

use App\Http\Controllers\api\internal\CustomerController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\BannerController;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->prefix('v1')->group(function () {
Route::prefix('v1')->group(function () {
    Route::post('send-message', [CustomerController::class, 'sendMessage']);
});



