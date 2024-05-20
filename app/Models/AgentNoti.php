<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentNoti extends Model
{
    use HasFactory;

    protected $fillable =  [
        'customer_id',
        'title',
        'message',
        'type',
        'image',
        'is_read'
    ];
}
