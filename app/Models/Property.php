<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Property extends Model
{
    use HasFactory;
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