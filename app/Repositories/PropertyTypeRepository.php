<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\PropertyType;

class PropertyTypeRepository
{
    static function getAll()
    {
        return PropertyType::all();
    }

    static function store(array $input)
    {
        return PropertyType::create($input);
    }

    static function delete(int $id)
    {
        return PropertyType::destroy($id);
    }

}