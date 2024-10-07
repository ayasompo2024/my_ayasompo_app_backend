<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductRsourceForEN;
use App\Http\Resources\ProductRsourceForMM;
use App\Repositories\ProductPropertyRepository;
use App\Repositories\ProductRepository;
use App\Traits\api\ApiResponser;

class ProductController extends Controller
{
    use ApiResponser;

    public function getActive()
    {
        $products = ProductRepository::getWithPropertyAndFAQ();
        $eng = ProductRsourceForEN::collection($products);
        $mm = ProductRsourceForMM::collection($products);

        return $this->successResponse2('Products', array_merge($eng->collection->toArray(), $mm->collection->toArray()), 200);
    }

    public function getPropertyByPropertyTypeIdAndProductId($product_id, $property_type_id)
    {
        $properties = ProductPropertyRepository::getByProductIdAndPropertyTypeId($product_id, $property_type_id);

        return $properties;
    }
}
