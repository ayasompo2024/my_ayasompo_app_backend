<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function getActive()
    {
        $banners = BannerRepository::getOnlyActive();
        return $banners->map(function ($banner) {
            return [
                // 'id' => $banner->id,
                'image' => $banner->image,
                'title' => $banner->title,
                'desc' => $banner->desc,
                'link' => $banner->link,
            ];
        });
    }
}