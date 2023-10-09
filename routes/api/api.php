<?php

use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\BannerController;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->prefix('v1')->group(function () {
Route::prefix('v1')->group(function () {
    Route::get('products', [ProductController::class, 'getActive']);
    Route::get('banners', [BannerController::class, 'getActive']);
});


// From Core

// "customer_code": "C000051354",
// "customer_type": "INDIVIDUAL",
// "customer_name": "ASHLEY",
// "customer_phoneno": "09563253321",
// "customer_nrc": "12/MAMAKA(N)564232"


//name
//password
//password comfirm
