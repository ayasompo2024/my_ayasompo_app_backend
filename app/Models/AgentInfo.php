<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'agent_name',
        'license_no',
        'agent_type',
        'expired_date',
        'email',
        'achievement',
        'title',
    ];

    protected $casts = [
        'expired_date' => 'date',
    ];
}
