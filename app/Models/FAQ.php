<?php

namespace App\Models;

use App\Traits\SendPushNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class FAQ extends Model
{
    use HasFactory, SendPushNotification;
    protected $table = 'faqs';

    protected $fillable = [
        "title",
        "desc",
        "product_id",
    ];

    function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($faq) {
            Log::info('FAQ creating : ' . $faq);
            $faq->sendFcmNoti();
        });
        static::updating(function ($faq) {
            Log::info('FAQ updating : ' . $faq);
            $faq->sendFcmNoti();
        });
        static::deleting(function ($faq) {
            Log::info('FAQ deleting : ' . $faq);
            $faq->sendFcmNoti();
        });
    }
    private function sendFcmNoti()
    {
        $this->sendFcmPushNotification("User id", "title", "message");
        Cache::forget('getWithPropertyAndFAQ');
    }
}