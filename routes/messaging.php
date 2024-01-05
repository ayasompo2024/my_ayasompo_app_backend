<?php

use App\Http\Controllers\admin\MessagingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [MessagingController::class, 'index'])->name('admin.messaging.index');
    Route::get('/unicast/show-form/{c_id}', [MessagingController::class, 'showUnicastForm'])->name('admin.messaging.unicast.show-form');
    Route::get('/multicast/show-form/{c_ids}', [MessagingController::class, 'showMulticastForm'])->name('admin.messaging.multicast.show-form');

    Route::post('/unicast/send', [MessagingController::class, 'sendAsUnicast'])->name('admin.messaging.unicast.send');
    Route::post('/broadcast/send', [MessagingController::class, 'sendAsBroadcast'])->name('admin.messaging.broadcast.send');
    Route::post('/multicast/send', [MessagingController::class, 'sendAsMulticast'])->name('admin.messaging.multicast.send');
    Route::get('/history', [MessagingController::class, 'history'])->name('admin.messaging.history');
    Route::get('/history/get-by-customer-id/{customerID}', [MessagingController::class, 'getByCustomerID'])->name('admin.messaging.history.get-by-customer-id');
});
