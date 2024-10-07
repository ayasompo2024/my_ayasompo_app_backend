<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file',
        'description',
        'sort',
        'description_for_admin',
        'status',
    ];
}
