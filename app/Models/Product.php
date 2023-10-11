<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "title",
        "product_type",
        "thumbnail",
        "brief_description",
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