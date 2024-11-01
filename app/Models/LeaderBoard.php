<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaderBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_title',
        'name',
        'points',
        'phone',
        'customer_id',
        'product_code',
        'period_from',
        'period_to',
    ];

    public function profile()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
