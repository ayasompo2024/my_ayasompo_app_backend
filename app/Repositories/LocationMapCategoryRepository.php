<?php
namespace App\Repositories;

use App\Models\LocationMapCategory;

class LocationMapCategoryRepository
{
    static function getAll()
    {
        return LocationMapCategory::orderBy('sort')->get();
    }
    static function store(array $input)
    {
        return LocationMapCategory::create($input);
    }
    static function getById($id)
    {
        return LocationMapCategory::find($id);
    }
    static function destroyById($id)
    {
        return LocationMapCategory::destroy($id);
    }
    static function update($id, $input)
    {
        return LocationMapCategory::find($id)->update($input);
    }

}