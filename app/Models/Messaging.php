<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messaging extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "message",
        "type",
        "multicast_uid",
        "customer_id",
        "image_url",
        "description",
        "noti_for",
        "is_read"
    ];

    function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}


