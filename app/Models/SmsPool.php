<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsPool extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'name',
        'phone',
        'content',
        'is_sended_sms',
        'is_login',
        'is_sended_to_circle',
        'circle_response'
    ];
}
