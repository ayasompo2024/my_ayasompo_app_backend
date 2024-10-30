<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermAndCondition extends Model
{
    use HasFactory;

    protected $table = 'term_and_conditions';

    protected $fillable = [
        'title',
        'content',
        'updated_at',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];
}
