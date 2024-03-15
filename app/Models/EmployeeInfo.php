<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    use HasFactory;
    protected $fillable = ["customer_id", "code", "designation", "department", "email", "office_phone", "office_address"];
}

