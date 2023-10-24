<?php
namespace App\Repositories;

use App\Models\Banner;

class BannerRepository
{

    static function getAll()
    {
        return Banner::all();
    }
    static function getOnlyActive()
    {
        return Banner::query()->where("status", 1)->orderByDesc('sort')->get();
    }
    static function store(array $input)
    {
        return Banner::create($input);
    }
    static function getById($id)
    {
        return Banner::find($id);
    }
    static function destroyById($id)
    {
        return Banner::destroy($id);
    }

    static function changeStatus($product_id)
    {
        $banner = Banner::where('id', $product_id)->first();
        if (!$banner)
            return false;
        return $banner->update(['status' => !$banner->status]);
    }
    static function update($id, $input)
    {
        return Banner::find($id)->update($input);
    }

}