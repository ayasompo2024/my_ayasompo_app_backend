<?php

use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\customer\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FAQController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertyTypeController;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => true]);

Route::group(['prefix' => 'admin', 'namspace' => 'admin', 'as' => 'admin.'], function () {
    // Route::group(['prefix' => 'admin', 'namspace' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('product', ProductController::class);
    Route::get('product/{product_id}/property-type/{property_type_id}', [ProductController::class, 'getPropertyByPropertyTypeIdAndProductId'])->name('product.property');
    Route::get('product/faq/{product_id}/', [ProductController::class, 'getFAQByProductId'])->name('product.faq');

    Route::resource('property', PropertyController::class);
    Route::get('property/new/{product_id}/{property_type_id}', [PropertyController::class, 'new'])->name('property.new');

    Route::resource('faq', FAQController::class);
    Route::get('faq/new/{product_id}', [FAQController::class, 'new'])->name('faq.new');

    Route::resource('property-type', PropertyTypeController::class, ['names' => 'property.type',]);

    Route::resource('banner', BannerController::class);

    Route::group(['namepsace' => 'customer'], function () {
        Route::resource('customer', CustomerController::class);
    });

});