<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ["name"];
    function admin()
    {
        return $this->hasMany(User::class, 'role', 'name');
    }

    function permission()
    {
        return $this->hasMany(Permission::class, 'id', 'role_id');
    }
}
