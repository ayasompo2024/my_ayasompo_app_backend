<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonMotorClaimCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_customer_id',
        'policy_or_risk_name',
        'contact_fullname',
        'contact_telephone',
        'nrc_no',
        'passport_no',
        'product_type',
        'accident_date',
        'accident_time',
        'accident_description',
        'accident_damaged_photos',
        'signature_image',
        'claim_channel',
    ];
}
