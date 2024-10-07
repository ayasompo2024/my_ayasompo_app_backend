<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'trace_id',
        'customer_id',
        'log_code ',
        'type',
        'value',
        'message',
        'datetime',
    ];
}
