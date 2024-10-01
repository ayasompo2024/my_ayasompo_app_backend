<?php

namespace App\Repositories;

use App\Models\LocationMapCategory;

class LocationMapCategoryRepository
{
    public static function getAll()
    {
        return LocationMapCategory::orderBy('sort')->get();
    }

    public static function store(array $input)
    {
        return LocationMapCategory::create($input);
    }

    public static function getById($id)
    {
        return LocationMapCategory::find($id);
    }

    public static function destroyById($id)
    {
        return LocationMapCategory::destroy($id);
    }

    public static function update($id, $input)
    {
        return LocationMapCategory::find($id)->update($input);
    }
}
