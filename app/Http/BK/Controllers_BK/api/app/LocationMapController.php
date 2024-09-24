<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Traits\api\ApiResponser;
use App\Services\LocationMapService;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\api\app\LocationMapRsource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocationMapController extends Controller
{
    use ApiResponser;
    public function getActive(Request $request,LocationMapService $locationMapService)
    {
        $validator = $this->reqValidation($request);
        if ($validator->fails()){
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);
        }
        return $this->successResponse("Here are Location Maps",
            $this->prepareDataForRes($request,$locationMapService)
            , 200);
    }
    private function prepareDataForRes($request ,$locationMapService){
        Session::put('currrent_customer', [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);
        $query_result = $locationMapService->getAllWithSortByLatLong($request);
        $dataWithResource = LocationMapRsource::collection($query_result);
        $data =  $dataWithResource->groupBy('category.name');
        $data["Near By"] = $dataWithResource;
        return $data;
    }
    private function reqValidation($request)
    {
        return Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
    }
}