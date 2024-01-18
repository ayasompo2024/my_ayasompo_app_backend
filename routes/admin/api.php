<?php

use App\Http\Controllers\api\admin\AuthController;

use App\Http\Controllers\api\admin\BannerController;
use App\Http\Controllers\api\admin\ProductController;
use App\Http\Controllers\api\admin\PropertyTypeController;
use Illuminate\Support\Facades\Route;

Route::post('v1/login', [AuthController::class, 'login']);

Route::prefix('v1')->group(function () {
    //Route::middleware('auth:api_admin')->prefix('v1')->group(function () {
    Route::get('products', [ProductController::class, "getAll"]);
    Route::post('products/add', [ProductController::class, "add"]);
    Route::put('products/change-status/{id}', [ProductController::class, "changeStatus"]);
    Route::delete('products/delete/{id}', [ProductController::class, "delete"]);

    Route::get('properties', [PropertyTypeController::class, "getAll"]);
    Route::post('properties/add', [PropertyTypeController::class, "store"]);
    Route::post('properties/update/{id}', [PropertyTypeController::class, "update"]);

    Route::get('banners', [BannerController::class, "getAll"]);
    Route::post('banners/store', [BannerController::class, "store"]);
    Route::put('banners/change-status/{id}', [BannerController::class, "changeStatus"]);
    Route::post('banners/update/{id}', [BannerController::class, "update"]);
    Route::delete('banners/delete/{id}', [BannerController::class, "delete"]);
});
