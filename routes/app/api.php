<?php

use App\Http\Controllers\api\app\ProductController;
use App\Http\Controllers\api\app\BannerController;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:app')->prefix('v1')->group(function () {
Route::prefix('v1')->group(function () {
    Route::get('products', [ProductController::class, 'getActive']);
    Route::get('banners', [BannerController::class, 'getActive']);
});

//});