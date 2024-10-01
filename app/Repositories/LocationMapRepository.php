<?php

namespace App\Repositories;

use App\Models\LocationMap;
use Illuminate\Support\Facades\Cache;

class LocationMapRepository
{
    public static function getAll()
    {
        return LocationMap::with('category')->get();
        $value = Cache::remember('LocationMapData', null, function () {
            return LocationMap::with('category')->get();
        });

        return $value;
    }

    public static function getAllWithSortByLatLong($lat, $log)
    {
        return $this->findNearest($lat, $log);
    }

    private function findNearest($latitude, $longitude)
    {
        return LocationMap::select('*')->whereNotNull('latitude')->whereNotNull('longitude')->where('latitude', '!=', '')->where('longitude', '!=', '')->selectRaw(
            '(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
            [$latitude, $longitude, $latitude]
        )
            ->orderBy('distance');
    }

    public static function store(array $input)
    {
        return LocationMap::create($input);
    }

    public static function getById($id)
    {
        return LocationMap::find($id);
    }

    public static function destroyById($id)
    {
        return LocationMap::destroy($id);
    }

    public static function update($id, $input)
    {
        return LocationMap::find($id)->update($input);
    }
}
