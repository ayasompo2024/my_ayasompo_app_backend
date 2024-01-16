<?php
namespace App\Services;

use App\Repositories\LocationMapCategoryRepository;
use App\Repositories\LocationMapRepository;
use App\Traits\FileUpload;

class LocationMapService
{

    use FileUpload;

    function getAll()
    {
        return LocationMapRepository::getAll();
    }

    function store($request)
    {
        $input = $this->prepareDataForStore($request);
        if (!$input)
            return false;
        return LocationMapRepository::store($input);
    }

    function getById($id)
    {
        return LocationMapRepository::getById($id);
    }

    function destroy($id)
    {
        return LocationMapRepository::destroyById($id);
    }
    private function prepareDataForStore($request)
    {
        $input = $request->only("location_map_category_id", "name", "phone", "open_hour", "close_hour", "address", "google_map","sort");
        $latitude_longitude = explode(',', $request->latitude_longitude);
        if (!isset($latitude_longitude[0]))
            return false;

        $input['latitude'] = $latitude_longitude[0];
        $input['longitude'] = $latitude_longitude[1];
        $input["image"] = $this->uploadFile($request->image, '/uploads/location-map/', 'aya_sompo');
        $input["open_days"] = implode(', ', $request->open_days);
        return $input;
    }

    function getAllCategory()
    {
        return LocationMapCategoryRepository::getAll();
    }
    function storeCategory($request)
    {
        $input = $request->only('name', 'sort');
        $upload_path = $this->uploadFile($request->image, '/uploads/location-map/', 'aya_sompo');
        $input["image"] = $upload_path;
        return LocationMapCategoryRepository::store($input);
    }
    function getCategoryById($id)
    {
        return LocationMapCategoryRepository::getById($id);
    }
    function updateCategory($id, $request)
    {
        $input = $request->only('name', 'sort');
        if ($request->image) {
            $upload_path = $this->uploadFile($request->image, '/uploads/banner/', 'aya_sompo');
            $input["image"] = $upload_path;
        }
        return LocationMapCategoryRepository::update($id, $input);
    }
}

