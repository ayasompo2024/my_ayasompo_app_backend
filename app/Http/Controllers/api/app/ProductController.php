<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductRsource;
use App\Repositories\ProductPropertyRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PropertyTypeRepository;
use App\Traits\api\ApiResponser;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use ApiResponser;
    function getActive()
    {
        $products = ProductRepository::getWithPropertyAndFAQ();
        return $this->successResponse2("Products", ProductRsource::collection($products), 200);
    }
    function getPropertyByPropertyTypeIdAndProductId($product_id, $property_type_id)
    {
        $properties = ProductPropertyRepository::getByProductIdAndPropertyTypeId($product_id, $property_type_id);
        return $properties;
    }
}