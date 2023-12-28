<?php
use App\Http\Controllers\api\app\CustomerController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1/auth/customer'], function () {
    Route::post('register', [CustomerController::class, 'register']);
    Route::post('login', [CustomerController::class, 'login']);
});
Route::middleware('auth:api')->prefix('v1/customer')->controller(CustomerController::class)->group(function () {
    Route::get('profile', 'profile');
    Route::get('profile/list', 'getProfileList');
    Route::post('update/profile-photo', 'updateProfilePhoto');
    Route::post('update/password', 'updatePassword');
    Route::post('disabled', 'disabledProfile');
});




