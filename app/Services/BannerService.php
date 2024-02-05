<?php
namespace App\Services;

use App\Repositories\BannerRepository;
use App\Traits\FileUpload;

class BannerService
{

    use FileUpload;
    function getAll()
    {
        return [
            "home" => BannerRepository::getHome(),
            "splash" => BannerRepository::getSplash()            
        ];
    }
    function getById($id)
    {
        return BannerRepository::getById($id);
    }

    function store($request)
    {
        $input = $request->only('title', 'desc', 'link', 'sort','for');
        $upload_path = $this->uploadFile($request->image, '/uploads/banner/', 'aya_sompo');
        $input["image"] = $upload_path;
        return BannerRepository::store($input);
    }

    function deleteById($id)
    {
        return BannerRepository::destroyById($id);
    }

    function changeStatus($id)
    {
        return BannerRepository::changeStatus($id);
    }

    function update($id, $request)
    {
        $input = $request->only('title', 'desc', 'link', 'sort');
        if ($request->image) {
            $upload_path = $this->uploadFile($request->image, '/uploads/banner/', 'aya_sompo');
            $input["image"] = $upload_path;
        }
        return BannerRepository::update($id, $input);
    }
}