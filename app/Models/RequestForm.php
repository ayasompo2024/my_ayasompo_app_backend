<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    use HasFactory;
    protected $fillable = [
        "app_customer_id",

        "incidentid",
        "ayasompo_casenumber",

        "inquiry_type",
        "ayasompo_caseid",
        
        "title",
        "reason",
        "effective_date",
        "bank_account_number",
        "bank_name",
        "other_bank_name",
        "other_bank_address",

        "ayasompo_vehicleno",
        "customerid_contact",
        "ayasompo_customercode",
        "ayasompo_policyno",
        "ayasompo_productcode",
        "ayasompo_classcode",
        "ayasompo_risksequenceno",

        "ayasompo_inquirydatetime",

        "inquiry_status",
        "is_read"
    ];

    function customer()
    {
        return $this->belongsTo(Customer::class, 'app_customer_id');
    }
}

























