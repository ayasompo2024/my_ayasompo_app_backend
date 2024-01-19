<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorClaimCase extends Model
{
    use HasFactory;
    protected $fillable = [
        "app_customer_id",
        "claim_channel",
        "vehicle_no",
        "driver_name",
        "contact_fullname",
        "contact_telephone",
        "accident_location",
        "accident_date",
        "accident_time",
        "accident_description",
        "accident_damaged_portion",
        "customer_code",
        "risk_name",
        "product_code",
        "class_code",
        "risk_seq_no",
        "policy_no",
        "customer_type",
        "signature_image",
        "accident_damaged_photos",
    ];
}





















