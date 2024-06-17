<?php

use App\Http\Controllers\admin\iam\IAMController;
use App\Http\Controllers\admin\MessagingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::controller(IAMController::class)->group(function () {
        Route::get('roles', 'roles')->name('admin.iam.roles');
        Route::post('roles', 'newRole')->name('admin.iam.roles');
        Route::get('roles/permisssions/{id}', 'showPermission')->name('admin.iam.roles.permisssions');
        Route::post('roles/permisssions/{id}/add', 'addPermissionToRole')->name('admin.iam.roles.add.permisssions');
    });
});
