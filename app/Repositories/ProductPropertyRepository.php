<?php

namespace App\Repositories;

use App\Models\Property;

class ProductPropertyRepository
{
    public static function getAll()
    {
        return Property::all();
    }

    public static function store(array $input)
    {
        return Property::create($input);

    }

    public static function getByProductIdAndPropertyTypeId($product_id, $property_type_id)
    {
        return Property::query()
            ->where('product_id', $product_id)
            ->where('property_type_id', $property_type_id)
            ->with(['type', 'product'])
            ->get();
    }

    public static function destroyByProductId(int $productId)
    {
        return Property::query()->where('product_id', $productId)->delete();
    }

    public static function destroyById(int $id)
    {
        return Property::destroy($id);
    }

    public static function getById($id)
    {
        return Property::find($id);
    }

    public static function update($id, $input)
    {
        return Property::find($id)->update($input);
    }
}
