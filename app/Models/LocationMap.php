<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationMap extends Model
{
    use HasFactory;
    protected $fillable = [
        "location_map_category_id",
        "image",
        "name",
        "phone",
        "open_days",
        "open_hour",
        "close_hour",
        "address",
        "latitude",
        "longitude",
        "google_map"
    ];

    function category()
    {
        return $this->belongsTo(LocationMapCategory::class, 'location_map_category_id');
    }
}


