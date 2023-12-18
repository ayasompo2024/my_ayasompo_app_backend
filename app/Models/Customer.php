<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable {
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'customer_code',
        'customer_phoneno',
        'user_name',
        'app_customer_type',
        'password',
        'device_token',
        'profile_photo',
        "risk_seqNo",
        "risk_name",
        "policy_number"
    ];
    function core() {
        return $this->belongsTo(CoreCustomer::class, 'id', 'app_customer_id');
    }
}

