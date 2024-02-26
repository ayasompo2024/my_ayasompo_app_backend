<?php

namespace App\Models;

use App\Traits\SendPushNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PropertyType extends Model
{
    use HasFactory, SendPushNotification;
    protected $fillable = ['name', 'name_mm'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($propertyType) {
            $propertyType->sendFcmNoti();
        });
        static::updating(function ($propertyType) {
            $propertyType->sendFcmNoti();
        });
        static::deleting(function ($propertyType) {
            $propertyType->sendFcmNoti();
        });
    }
    private function sendFcmNoti()
    {
        $notification = ["title" => "Product Announcement!", "body" => null];
        $data = ["title" => "Product", "body" => null];
        $this->sendAsbroadcast($notification, $data);
        Cache::forget('getWithPropertyAndFAQ');
    }

}
