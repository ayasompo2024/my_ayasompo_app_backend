<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class FAQ extends Model
{
    use HasFactory;
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
        static::creating(function ($product) {
            Cache::forget('getWithPropertyAndFAQ');
        });
        static::updating(function ($product) {
            Cache::forget('getWithPropertyAndFAQ');
        });
        static::deleting(function ($product) {
            Cache::forget('getWithPropertyAndFAQ');
        });
    }
}