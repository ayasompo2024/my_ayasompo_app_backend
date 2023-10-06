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
        // return Product::find($id);
    }
    static function destroy($id)
    {
        return Banner::destroy($id);
    }
}