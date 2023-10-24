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

    static function getById(int $id)
    {
        return PropertyType::query()->find($id);
    }

    static function updateById($id, $input)
    {
        return PropertyType::query()->find($id)->update($input);
    }


}