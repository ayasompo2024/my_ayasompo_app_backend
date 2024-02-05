<?php

namespace App\Models;

use App\Traits\SendPushNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Banner extends Model
{
    use HasFactory, SendPushNotification;
    protected $fillable = [
        'title',
        'desc',
        'image',
        'link',
        'sort',
        'status',
        'for'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($banner) {
            Log::info('banner creating : ' . $banner);
            $banner->sendFcmNoti();
        });
        static::updating(function ($banner) {
            Log::info('banner  updating: ' . $banner);
            $banner->sendFcmNoti();
        });
        static::deleting(function ($banner) {
            Log::info('banner deleting : ' . $banner);
            $banner->sendFcmNoti();
        });
    }
    private function sendFcmNoti()
    {
        $notification = ["title" => "Content Update Delivered", "body" => null];
        $data = ["title" => "Banner", "body" => null];
        $this->sendAsbroadcast($notification, $data);
        // Cache::forget('getWithPropertyAndFAQ');
    }
}