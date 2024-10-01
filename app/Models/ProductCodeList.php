<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCodeList extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_code',
        'class_description',
        'product_code',
        'product_description',
    ];
}
