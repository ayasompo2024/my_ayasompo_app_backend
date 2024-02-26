<?php

namespace App\Models;


use App\Traits\SendPushNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Property extends Model
{
    use HasFactory, SendPushNotification;
    protected $fillable = [
        "product_id",
        "property_type_id",
        "title",
        "desc",
        "title_mm",
        "desc_mm"
    ];
    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($property) {
            $property->sendFcmNoti();
        });
        static::updating(function ($property) {
            $property->sendFcmNoti();
        });
        static::deleting(function ($property) {
            $property->sendFcmNoti();
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