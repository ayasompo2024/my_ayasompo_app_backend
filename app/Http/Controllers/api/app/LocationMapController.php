<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Traits\api\ApiResponser;
use App\Services\LocationMapService;
use App\Http\Resources\api\app\LocationMapRsource;

class LocationMapController extends Controller
{
    use ApiResponser;
    public function getActive(LocationMapService $locationMapService)
    {
        return $this->successResponse("Here are Location Maps",
            LocationMapRsource::collection($locationMapService->getAll())->groupBy('category.name')
            , 200);
    }
    private function transformeToBase64($image)
    {
        $imagePath = public_path($image);
        $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
        return "data:image/" . $extension . ";base64," . base64_encode(file_get_contents($imagePath));
    }
}