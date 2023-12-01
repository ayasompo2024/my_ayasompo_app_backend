<?php

use App\Http\Controllers\api\app\CustomerController;
use App\Http\Controllers\api\app\InsuranceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1/auth/customer'], function () {
    Route::post('register', [CustomerController::class, 'register']);
    Route::post('login', [CustomerController::class, 'login']);
});

Route::middleware('auth:api')->prefix('v1/customer')->controller(CustomerController::class)->group(function () {
    Route::get('profile', 'profile');
    Route::post('update/profile-photo', 'updateProfilePhoto');
    // Route::post('logout', 'AuthController@logout');
});




