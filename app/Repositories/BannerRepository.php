<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository
{
    public static function getHome()
    {
        return Banner::where('for', 'Home')->orderBy('sort')->get();
    }

    public static function getSplash()
    {
        return Banner::where('for', 'Splash')->orderBy('sort')->get();
    }

    public static function getSplashFirst()
    {
        return Banner::where('for', 'Splash')->orderBy('sort')->first();
    }

    public static function getAll()
    {
        return Banner::orderBy('sort')->get();
    }

    public static function getOnlyActive()
    {
        return Banner::query()->where('status', 1)->orderByDesc('sort')->get();
    }

    public static function store(array $input)
    {
        return Banner::create($input);
    }

    public static function getById($id)
    {
        return Banner::find($id);
    }

    public static function destroyById($id)
    {
        return Banner::destroy($id);
    }

    public static function changeStatus($product_id)
    {
        $banner = Banner::where('id', $product_id)->first();
        if (! $banner) {
            return false;
        }

        return $banner->update(['status' => ! $banner->status]);
    }

    public static function update($id, $input)
    {
        return Banner::find($id)->update($input);
    }
}
