<?php

use App\Http\Controllers\admin\AdminAccountController;
use App\Http\Controllers\admin\AdminGoJoyController;
use App\Http\Controllers\admin\AdminTermAndConditionController;
use App\Http\Controllers\admin\agent\LeaderBoardController;
use App\Http\Controllers\admin\agent\TrainingResourceController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\ClaimcaseController;
use App\Http\Controllers\admin\customer\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FAQController;
use App\Http\Controllers\admin\locationmap\LocationMapCategoryController;
use App\Http\Controllers\admin\locationmap\LocationMapController;
use App\Http\Controllers\admin\ProductCodeListController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertyTypeController;
use App\Http\Controllers\admin\RequestFormController;
use App\Http\Controllers\admin\RequestFormTypeController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('65aa0088d4d28ec2ed4748bc8', [LoginController::class, 'showLoginForm'])->name('65aa0088d4d28ec2ed4748bc8');
Route::post('65aa0088d4d28ec2ed4748bc8', [LoginController::class, 'login'])->name('65aa0088d4d28ec2ed4748bc8');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(
    [
        'prefix' => 'admin',
        'namspace' => 'admin',
        'as' => 'admin.',
        'middleware' => ['auth', 'log.admin.requests'],
    ],
    function () {
        Route::group(['prefix' => 'gojoy'], function () {
            Route::get('/', [AdminGoJoyController::class, 'index'])->name('gojoy.index');
            Route::get('/{id}', [AdminGoJoyController::class, 'show'])->name('gojoy.show');
        });

        Route::group(['prefix' => 'term-and-conditions'], function () {
            Route::get('/', [AdminTermAndConditionController::class, 'index'])->name('term-and-conditions.index');
            Route::get('/create', [AdminTermAndConditionController::class, 'store'])->name('term-and-conditions.create');
            Route::get('/{id}', [AdminTermAndConditionController::class, 'update'])->name('term-and-conditions.update');
        });

        Route::resource('account', AdminAccountController::class);
        Route::post('account/disabled/toggle/{id}', [AdminAccountController::class, 'disabledToggle'])->name('account.disabled.toggle');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('settings', SettingController::class);
        Route::get('logs/admin', [DashboardController::class, 'adminLogs'])->name('dashboard.logs.admin');

        Route::resource('product', ProductController::class);
        Route::post('product/force/update', [ProductController::class, 'forceUpdateToApp'])->name('product.force-update');
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

        Route::resource('property-type', PropertyTypeController::class, ['names' => 'property.type']);

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
        Route::resource('agent/leaderboard', LeaderBoardController::class);
        Route::resource('agent/training-resource', TrainingResourceController::class);
        Route::put('agent/training-resource/status/toggle/{id}', [TrainingResourceController::class, 'toggleStatus']);

        Route::group(['namepsace' => 'customer'], function () {
            Route::resource('customer', CustomerController::class);

            Route::controller(CustomerController::class)->group(function () {
                Route::get('pool', 'pool')->name('customer.pool');

                Route::get('customer/type/{type}', [CustomerController::class, 'filterByType'])->name('customer.filter.by-type');
                Route::get('/{id}', [CustomerController::class, 'show'])->name('customer.show');

                Route::get('customer1/import', [CustomerController::class, 'import'])->name('customer1.import');

                Route::post('customer/disabled/toggle/{id}', 'toggleDisabled')->name('customer.disabled.toggle');
                Route::get('customer/search/by-phone', 'searchByPhone')->name('customer.search.by-phone');
                Route::post('customer/get-customers-list-by-policy', 'getCustomersListByPolicy')->name('customer.get-customers-list-by-policy');

                Route::post('customer/new/employee', 'addNewEmployeeUser')->name('customer.new.employee');
                Route::post('customer/new/agent', 'addNewAgentUser')->name('customer.new.agent');
                Route::put('customer/update/agent/{id}', 'updateAgent')->name('customer.update.agent');

                Route::delete('customer/delete/agent/code/{id}', 'deleteAgentCode')->name('customer.delete.agent.code');
                Route::put('customer/update/agent/code/{id}', 'updateAgetCode')->name('customer.update.agent.code');
                Route::post('customer/new/agent/code', 'newAgentCode')->name('customer.new.agent.code');

                //Ajax Call
                Route::post('customer/register/preview-customer', 'previewBeforeResgister');
                Route::post('customer/register', 'register');
                Route::post('pool/resolve', 'resolve');
            });
        });

        Route::get('file/download/{filename}', [SettingController::class, 'downloadFile'])->name('file.download');
    }

    //Route::get('product-code-list/now', [ProductCodeListController::class, 'stoer2']);
);
Route::get('file/download/VCF', [HomeController::class, 'downloadFileAsVCF']);
Route::get('file/download/VCF/agent', [HomeController::class, 'downloadFileAsVCFForAgent']);

Route::get('/test', function () {
    return 'test';
});
//Route::get('g',[HomeController::class,'g']);
