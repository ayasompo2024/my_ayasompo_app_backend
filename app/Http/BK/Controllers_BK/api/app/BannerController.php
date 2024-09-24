<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function getActive()
    {
        return BannerRepository::getOnlyActive()->map(function ($banner) {
            return [
                // 'id' => $banner->id,
                // 'image' => $this->transformeToBase64($banner->image),
                'image' => config("app.app_domain"). $banner->image,
                'title' => $banner->title,
                'desc' => $banner->desc,
                'link' => $banner->link,
            ];
        });
    }
    private function transformeToBase64($image)
    {
        $imagePath = public_path($image);
        $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
        return "data:image/" . $extension . ";base64," . base64_encode(file_get_contents($imagePath));
    }

    function getSplashActive()
    {
        return BannerRepository::getSplashFirst();
    }
}