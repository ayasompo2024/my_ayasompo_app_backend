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
    static function getAllWithSortByLatLong($lat,$log){
        return $this->findNearest($lat,$log);
    }
    private function findNearest($latitude, $longitude)
    {
        return LocationMap::select("*")->whereNotNull("latitude")->whereNotNull("longitude")->where("latitude", '!=', '')->where("longitude", '!=', '')->selectRaw(
                '(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
                [$latitude, $longitude, $latitude]
            )
            ->orderBy('distance');
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