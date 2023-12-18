<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Cache;
use App\Models\LocationMap;

class LocationMapRepository
{
    static function getAll()
    {
         return LocationMap::with('category')->get();
        $value = Cache::remember('LocationMapData', null, function () {
            return LocationMap::with('category')->get();
        });
        return $value;
    }

    static function store(array $input)
    {
        return LocationMap::create($input);
    }
    static function getById($id)
    {
        return LocationMap::find($id);
    }
    static function destroyById($id)
    {
        return LocationMap::destroy($id);
    }
    static function update($id, $input)
    {
        return LocationMap::find($id)->update($input);
    }

}