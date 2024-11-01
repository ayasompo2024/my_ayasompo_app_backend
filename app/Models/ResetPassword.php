<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResetPassword extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reset_passwords';

    protected $fillable = [
        'customer_id', 'phone_no', 'customer_name', 'customer_type', 'password', 'hash_password', 'sms_status',
    ];
}
