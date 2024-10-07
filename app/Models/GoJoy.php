<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoJoy extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'go_joys';

    protected $fillable = [
        'customer_id',
        'full_name',
        'nrc',
        'dob',
        'mobile_number',
        'email',
        'beneficiary_name',
        'beneficiary_contact',
        'tag_name',
        'status',
    ];

    protected $casts = [
        'dob' => 'date',
    ];
}
