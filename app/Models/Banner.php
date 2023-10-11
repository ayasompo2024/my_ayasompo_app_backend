<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'image',
        'link',
        'sort',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            // Cache::forget('getWithPropertyAndFAQ');
        });
        static::updating(function ($product) {
            // Cache::forget('getWithPropertyAndFAQ');
        });
        static::deleting(function ($product) {
            // Cache::forget('getWithPropertyAndFAQ');
        });
    }
}