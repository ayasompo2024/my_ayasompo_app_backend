<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAdminRequest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','ip','url','method','req_data'];

    function admin()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}