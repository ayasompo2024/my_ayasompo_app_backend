<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentInfo extends Model
{
    use HasFactory;
    protected $fillable = ["customer_id","license_no ","agent_type  ","expiry_date","email","achievement"];
}
