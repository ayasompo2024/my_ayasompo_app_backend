<?php

namespace App\Models;


use App\Traits\SendPushNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use HasFactory, SendPushNotification;
    protected $fillable = [
        "name",
        "title",
        "product_type",
        "thumbnail",
        "brief_description",
        "name_mm",
        "title_mm",
        "brief_description_mm",
        "sort",
        "status",
        "premium_calculator_url",
        "class_code",
        "product_code"
    ];
    public function properties()
    {
        return $this->hasMany(Property::class, 'product_id', 'id');
    }
    public function faqs()
    {
        return $this->hasMany(FAQ::class, 'product_id', 'id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            $product->sendFcmNoti();
        });
        static::updating(function ($product) {
            $product->sendFcmNoti();
        });
        static::deleting(function ($product) {
            $product->sendFcmNoti();
        });
    }
    private function sendFcmNoti()
    {
        $notification = ["title" => "Content Update Delivered!", "body" => null];
        $data = ["title" => "Product", "body" => null];
        $this->sendAsbroadcast($notification, $data);
        Cache::forget('getWithPropertyAndFAQ');
    }
}
