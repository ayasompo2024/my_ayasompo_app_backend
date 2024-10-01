<?php

namespace App\Services;

use App\Repositories\LocationMapCategoryRepository;
use App\Repositories\LocationMapRepository;
use App\Traits\FileUpload;

class LocationMapService
{
    use FileUpload;

    public function getAll()
    {
        return LocationMapRepository::getAll();
    }

    public function getAllWithSortByLatLong($request)
    {
        return LocationMapRepository::getAll($request->latitude, $request->longitude);
    }

    public function store($request)
    {
        $input = $this->prepareDataForStore($request);
        if (! $input) {
            return false;
        }

        return LocationMapRepository::store($input);
    }

    public function update($id, $request)
    {
        $input = $this->prepareDataForStore($request);
        if (! $input) {
            return false;
        }

        return LocationMapRepository::update($id, $input);
    }

    public function getById($id)
    {
        return LocationMapRepository::getById($id);
    }

    public function destroy($id)
    {
        return LocationMapRepository::destroyById($id);
    }

    private function prepareDataForStore($request)
    {
        $input = $request->only('location_map_category_id', 'name', 'phone', 'open_hour', 'close_hour', 'address', 'google_map', 'sort');
        $latitude_longitude = explode(',', $request->latitude_longitude);
        if (! isset($latitude_longitude[0])) {
            return false;
        }

        $input['latitude'] = $latitude_longitude[0];
        $input['longitude'] = $latitude_longitude[1];
        if ($request->image) {
            $input['image'] = $this->uploadFile($request->image, '/uploads/location-map/', 'aya_sompo');
        }
        $input['open_days'] = implode(', ', $request->open_days);

        return $input;
    }

    public function getAllCategory()
    {
        return LocationMapCategoryRepository::getAll();
    }

    public function storeCategory($request)
    {
        $input = $request->only('name', 'sort');
        $upload_path = $this->uploadFile($request->image, '/uploads/location-map/', 'aya_sompo');
        $input['image'] = $upload_path;

        return LocationMapCategoryRepository::store($input);
    }

    public function getCategoryById($id)
    {
        return LocationMapCategoryRepository::getById($id);
    }

    public function updateCategory($id, $request)
    {
        $input = $request->only('name', 'sort');
        if ($request->image) {
            $upload_path = $this->uploadFile($request->image, '/uploads/banner/', 'aya_sompo');
            $input['image'] = $upload_path;
        }

        return LocationMapCategoryRepository::update($id, $input);
    }
}
