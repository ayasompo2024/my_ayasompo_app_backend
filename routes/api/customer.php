<?php

use App\Http\Controllers\api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth/customer'], function () {
    Route::post('register', [CustomerController::class, 'register']);
    Route::post('login', [CustomerController::class, 'login']);
});

Route::middleware('auth:api')->prefix('customer')->group(function () {
    Route::get('profile', [CustomerController::class, 'profile']);
    Route::post('get/by-policy-no', [CustomerController::class, 'getCustomersByPolicyNumber']);
    // Route::put('update', 'CustomerController@update');
    // Route::post('logout', 'AuthController@logout');
});