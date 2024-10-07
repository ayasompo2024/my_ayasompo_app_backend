<?php

namespace App\Repositories;

use App\Models\ProductCodeListRequestFormType;

class ProductCodeListRequestFormTypeRepo
{
    public static function getEndorsementFormByProductCode($product_code)
    {
        return ProductCodeListRequestFormType::query()->select('product_code_list_id', 'request_form_type_id', 'product_code')->with('requestRormType:id,type')->where('product_code', $product_code)->get();
    }
}
