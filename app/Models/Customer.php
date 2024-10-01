<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'customer_code',
        'customer_phoneno',
        'user_name',
        'app_customer_type',
        'password',
        'device_token',
        'profile_photo',
        'risk_seqNo',
        'risk_name',
        'policy_number',
        'is_disabled',
        'disabled_from',
        'last_logined_at',
    ];

    protected $hidden = [
        'password',
    ];

    public function core()
    {
        return $this->belongsTo(CoreCustomer::class, 'id', 'app_customer_id');
    }

    public function employeeInfo()
    {
        return $this->belongsTo(EmployeeInfo::class, 'id', 'customer_id');
    }

    public function agentInfo()
    {
        return $this->belongsTo(AgentInfo::class, 'id', 'customer_id');
    }

    public function accountCodes()
    {
        return $this->hasMany(AgentAccountCode::class);
    }

    public function scopeIndividual($query)
    {
        return $query->where('app_customer_type', 'INDIVIDUAL');
    }

    public function scopeGroup($query)
    {
        return $query->where('app_customer_type', 'GROUP');
    }

    public function scopeEmloyee($query)
    {
        return $query->where('app_customer_type', 'EMPLOYEE');
    }

    public function scopeAgent($query)
    {
        return $query->where('app_customer_type', 'AGENT');
    }
}
