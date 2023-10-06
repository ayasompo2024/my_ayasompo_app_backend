<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "title",
        "product_type",
        "thumbnail",
        "brief_description"
    ];
    public function properties()
    {
        return $this->hasMany(Property::class, 'product_id', 'id');
    }
    public function faqs()
    {
        return $this->hasMany(FAQ::class,'product_id','id');
    }
}