<?php

use App\Http\Controllers\admin\MessagingController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [MessagingController::class, 'index'])->name('admin.messaging.index');
    Route::get('/unicast/show-form/{c_id}', [MessagingController::class, 'showUnicastForm'])->name('admin.messaging.unicast.show-form');
    Route::get('/multicast/show-form/{c_ids}', [MessagingController::class, 'showMulticastForm'])->name('admin.messaging.multicast.show-form');
    Route::get('/multicast/by-phones/show-form', [MessagingController::class, 'showMulticastFormByPhones'])->name('admin.messaging.multicast.show-form-by-phone');

    Route::post('/multicast/by-phones', [MessagingController::class, 'sendMulticastByPhones'])->name('admin.messaging.multicast.by-phones.send');
    Route::post('/unicast/send', [MessagingController::class, 'sendAsUnicast'])->name('admin.messaging.unicast.send');
    Route::post('/broadcast/send', [MessagingController::class, 'sendAsBroadcast'])->name('admin.messaging.broadcast.send');
    Route::post('/multicast/send', [MessagingController::class, 'sendAsMulticast'])->name('admin.messaging.multicast.send');

    Route::get('/history', [MessagingController::class, 'history'])->name('admin.messaging.history');
    Route::get('/history/get-by-customer-id/{customerID}', [MessagingController::class, 'getByCustomerID'])->name('admin.messaging.history.get-by-customer-id');

    Route::get('/history/agent', [MessagingController::class, 'getAgentNotiList'])->name('admin.messaging.agent-history');
    Route::get('/agent-noti-form', [MessagingController::class, 'showAgentNotiForm'])->name('admin.messaging.agent-noti-form');
    Route::post('/send-campaign-noti', [MessagingController::class, 'sendCampaignNoti'])->name('admin.messaging.send-campaign-noti');
    //Route::post('/history/agent', [MessagingController::class, 'sendAgentNoti'])->name('admin.messaging.history');
});
