<?php

use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\customer\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FAQController;
use App\Http\Controllers\admin\ProductCodeListController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertyTypeController;
use App\Http\Controllers\admin\RequestFormController;
use App\Http\Controllers\admin\RequestFormTypeController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\AdminAccountController;
use App\Http\Controllers\admin\ClaimcaseController;
use App\Http\Controllers\admin\locationmap\LocationMapCategoryController;
use App\Http\Controllers\admin\locationmap\LocationMapController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('65aa0088d4d28ec2ed4748bc8', [LoginController::class, 'showLoginForm'])->name('65aa0088d4d28ec2ed4748bc8');
Route::post('65aa0088d4d28ec2ed4748bc8', [LoginController::class, 'login'])->name("65aa0088d4d28ec2ed4748bc8");
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'namspace' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::resource('account', AdminAccountController::class);
    Route::post('account/disabled/toggle/{id}', [AdminAccountController::class, 'disabledToggle'])->name('account.disabled.toggle');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('settings', SettingController::class);
    Route::get('logs', [DashboardController::class, 'logs'])->name('dashboard.logs');

    Route::resource('product', ProductController::class);
    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('{product_id}/property-type/{property_type_id}', 'getPropertyByPropertyTypeIdAndProductId')->name('product.property');
        Route::get('faq/{product_id}', 'getFAQByProductId')->name('product.faq');
        Route::put('change-status/{product_id}', 'changeStatus')->name('product.change-status');
    });

    Route::resource('banner', BannerController::class);
    Route::put('banner/change-status/{id}', [BannerController::class, 'changeStatus'])->name('banner.change-status');

    Route::resource('property', PropertyController::class);
    Route::get('property/new/{product_id}/{property_type_id}', [PropertyController::class, 'new'])->name('property.new');

    Route::resource('faq', FAQController::class);
    Route::get('faq/new/{product_id}', [FAQController::class, 'new'])->name('faq.new');

    Route::resource('property-type', PropertyTypeController::class, ['names' => 'property.type',]);

    Route::resource('product-code-list', ProductCodeListController::class);
    Route::controller(ProductCodeListController::class)->group(function () {
        Route::get('product-code-list/search/by-product-code', 'searchByProductCode')->name('product-code-list.search.by-product-code');
        Route::get('product-code-list/{id}/show-request-form-type', 'showRequestFormType')->name('product-code-list.show-request-form-type');
        Route::post('product-code-list/bind-with-request-form-type', 'bindWithRequestFormType')->name('product-code-list.bind-with-request-form-type');
    });

    Route::get('request-form', [RequestFormController::class, 'index'])->name('request-form.lists');
    Route::resource('request-form/type', RequestFormTypeController::class, ['names' => 'request-form.type']);

    Route::controller(ClaimcaseController::class)->group(function () {
        Route::get('claim-case/index', 'index')->name('claim-case.index');
        Route::get('claim-case/motor', 'motorCase')->name('claim-case.motor');
        Route::get('claim-case/non-motor', 'nonMotorCase')->name('claim-case.non-motor');
    });

    Route::resource('location-map', LocationMapController::class);
    Route::resource('location-map-category', LocationMapCategoryController::class);

    Route::group(['namepsace' => 'customer'], function () {
        Route::resource('customer', CustomerController::class);
        Route::controller(CustomerController::class)->group(function () {
            Route::post('customer/disabled/toggle/{id}', 'toggleDisabled')->name('customer.disabled.toggle');
            Route::get('customer/search/by-phone', 'searchByPhone')->name('customer.search.by-phone');
            Route::post('customer/get-customers-list-by-policy', 'getCustomersListByPolicy')->name('customer.get-customers-list-by-policy');
            //Ajax Call
            Route::post('customer/register/preview-customer', 'previewBeforeResgister');
            Route::post('customer/register', 'register');
        });
    });
});

//Route::get('product-code-list/now', [ProductCodeListController::class, 'stoer2']);

