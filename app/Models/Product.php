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
        "sort",
        "status"
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
            // Log::info('product creating : ' . $product);
            $product->sendFcmNoti();
        });
        static::updating(function ($product) {
            // Log::info('product  updating: ' . $product);
            $product->sendFcmNoti();
        });
        static::deleting(function ($product) {
            // Log::info('product deleting : ' . $product);
            $product->sendFcmNoti();
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
