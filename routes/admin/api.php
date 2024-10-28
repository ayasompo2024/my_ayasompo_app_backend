<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\api\admin\AdminResetPasswordController;
use App\Http\Controllers\api\admin\AuthController;
use App\Http\Controllers\api\admin\BannerController;
use App\Http\Controllers\api\admin\CustomerController;
use App\Http\Controllers\api\admin\GoJoyController;
use App\Http\Controllers\api\admin\NotificationController;
use App\Http\Controllers\api\admin\ProductController;
use App\Http\Controllers\api\admin\PropertyTypeController;
use Illuminate\Support\Facades\Route;

Route::post('v1/login', [AuthController::class, 'login']);

Route::prefix('v1')->group(function () {

    Route::middleware('auth:api_admin')->group(function () {

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', [UserController::class, 'index']);
        });

        Route::group(['prefix' => 'customer'], function () {
            Route::post('/{id}', [CustomerController::class, 'update']);
            Route::put('/core/{id}', [CustomerController::class, 'updateCoreInfo']);
            Route::put('/employee/{id}', [CustomerController::class, 'updateEmployeeInfo']);
            Route::put('/agent/{id}', [CustomerController::class, 'updateAgentInfo']);
            Route::get('/{type}', [CustomerController::class, 'index']);
            Route::get('/count/{type}', [CustomerController::class, 'count']);
            Route::get('/detail/{id}', [CustomerController::class, 'show']);
            Route::delete('/{id}', [CustomerController::class, 'destroy']);
        });

        Route::group(['prefix' => 'messaging'], function () {
            Route::post('/', [NotificationController::class, 'store']);
        });

        Route::group(['prefix' => 'gojoy'], function () {
            Route::get('/', [GoJoyController::class, 'index']);
            Route::get('/{id}', [GoJoyController::class, 'show']);
            Route::put('/{id}', [GoJoyController::class, 'update']);
            Route::delete('/{id}', [GoJoyController::class, 'destroy']);
        });

        Route::group(['prefix' => 'reset-password'], function () {
            Route::post('/customer', [AdminResetPasswordController::class, 'customerResetPassword']);
            Route::post('/customer/{id}/send-sms', [AdminResetPasswordController::class, 'sendResetPassword']);
            Route::get('/customer/{id}', [AdminResetPasswordController::class, 'index']);
        });
    });

    //Route::middleware('auth:api_admin')->prefix('v1')->group(function () {
    Route::get('products', [ProductController::class, 'getAll']);
    Route::post('products/add', [ProductController::class, 'add']);
    Route::put('products/change-status/{id}', [ProductController::class, 'changeStatus']);
    Route::delete('products/delete/{id}', [ProductController::class, 'delete']);

    Route::get('properties', [PropertyTypeController::class, 'getAll']);
    Route::post('properties/add', [PropertyTypeController::class, 'store']);
    Route::post('properties/update/{id}', [PropertyTypeController::class, 'update']);

    Route::get('banners', [BannerController::class, 'getAll']);
    Route::post('banners/store', [BannerController::class, 'store']);
    Route::put('banners/change-status/{id}', [BannerController::class, 'changeStatus']);
    Route::post('banners/update/{id}', [BannerController::class, 'update']);
    Route::delete('banners/delete/{id}', [BannerController::class, 'delete']);

});
