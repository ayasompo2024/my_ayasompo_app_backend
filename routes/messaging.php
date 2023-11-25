<?php

use App\Http\Controllers\admin\MessagingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [MessagingController::class, 'index'])->name('admin.messaging.index');
    Route::get('/unicast/show-form/{c_id}', [MessagingController::class, 'showUnicastForm'])->name('admin.messaging.unicast.show-form');

    Route::post('/unicast/send', [MessagingController::class, 'send'])->name('admin.messaging.unicast.send');
});