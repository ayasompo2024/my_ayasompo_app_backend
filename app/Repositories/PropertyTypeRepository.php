<?php

namespace App\Repositories;

use App\Models\PropertyType;

class PropertyTypeRepository
{
    public static function getAll()
    {
        return PropertyType::all();
    }

    public static function store(array $input)
    {
        return PropertyType::create($input);
    }

    public static function delete(int $id)
    {
        return PropertyType::destroy($id);
    }

    public static function getById(int $id)
    {
        return PropertyType::query()->find($id);
    }

    public static function updateById($id, $input)
    {
        return PropertyType::query()->find($id)->update($input);
    }
}
