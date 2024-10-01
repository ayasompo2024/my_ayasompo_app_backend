<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCodeListRequestFormType extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code_list_id',
        'request_form_type_id',
        'product_code',
    ];

    public function requestRormType()
    {
        return $this->belongsTo(RequestFormType::class, 'request_form_type_id', 'id');
    }
}
