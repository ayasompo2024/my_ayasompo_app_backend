<?php

<<<<<<< HEAD
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

Route::get('65aa0088d4d
=======
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
>>>>>>> 6cfb29035e627280ba75de6e343d9de2ea6ed8f7
