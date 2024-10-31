<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermAndCondition extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'term_and_conditions';

    protected $fillable = [
        'title',
        'content',
        'status',
    ];
}
