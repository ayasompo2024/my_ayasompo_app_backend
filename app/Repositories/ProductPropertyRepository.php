<?php
namespace App\Repositories;

use App\Models\Property;

class ProductPropertyRepository
{
    static function getAll()
    {
        return Property::all();
    }
    static function store(array $input)
    {
        return Property::create($input);

    }
    static function getByProductIdAndPropertyTypeId($product_id, $property_type_id)
    {
        return Property::query()
            ->where("product_id", $product_id)
            ->where("property_type_id", $property_type_id)
            ->with(['type', 'product'])
            ->get();
    }
    static function destroyByProductId(int $productId)
    {
        return Property::query()->where("product_id", $productId)->delete();
    }
    static function destroyById(int $id)
    {
        return Property::destroy($id);
    }

}