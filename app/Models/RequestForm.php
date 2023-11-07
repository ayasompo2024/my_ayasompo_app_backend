<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    use HasFactory;
    protected $fillable = [
        "casetypecode ",
        "ayasompo_enquirychannels",

        "ayasompo_enquiryproducttype",
        "ayasompo_enquirytypes",
        "ayasompo_accounthandlerlookup",

        "title",
        "ayasompo_remark",
        "ayasompo_vehicleno",
        "customerid_contact",
        "ayasompo_customercode",
        "ayasompo_policyno",
        "ayasompo_productcode",
        "ayasompo_classcode",
        "ayasompo_risksequenceno",

        "ayasompo_caseid",
        "ayasompo_inquirydatetime",
    ];
}




















