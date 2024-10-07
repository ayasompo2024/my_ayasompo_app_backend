<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_customer_id',
        'customer_code',
        'customer_type',
        'customer_name',
        'customer_phoneno',
        'customer_nrc',
        'email',
        'address',
    ];
}
