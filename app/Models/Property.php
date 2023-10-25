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
            Log::info('property creating : ' . $property);
            $property->sendFcmNoti();
        });
        static::updating(function ($property) {
            Log::info('property updating : ' . $property);
            $property->sendFcmNoti();
        });
        static::deleting(function ($property) {
            Log::info('property deleting : ' . $property);
            $property->sendFcmNoti();
        });
    }
    private function sendFcmNoti()
    {
        // $this->sendFcmPushNotification("1", "sendFcmNoti ddd", "sendFcmNoti tete");
        Cache::forget('getWithPropertyAndFAQ');
    }
}