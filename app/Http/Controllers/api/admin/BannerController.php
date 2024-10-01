<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Traits\api\ApiResponser;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    use ApiResponser, FileUpload;

    public function getAll(BannerService $bannerService)
    {
        return $this->successResponse('Banners', $bannerService->getAll(), 200);
    }

    public function changeStatus($id, BannerService $bannerService)
    {
        return $bannerService->changeStatus($id) ?
            $this->successResponse('Created !', ['Target  id' => $id], 200) :
            $this->errorResponse('Fail', 500);
    }

    public function delete($id, BannerService $bannerService)
    {
        return $bannerService->deleteById($id) ?
            $this->successResponse('Deleted !', ['Target  id' => $id], 200) :
            $this->errorResponse('Fail', 500);
    }

    public function store(Request $request, BannerService $bannerService)
    {
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }
        $status = $bannerService->store($request);

        return $status ?
            $this->successResponse('Created !', $status, 200) :
            $this->errorResponse('Fail', 500);
    }

    public function update(Request $request, $id, BannerService $bannerService)
    {
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }

        $status = $bannerService->update($id, $request);

        return $status ?
            $this->successResponse('Updated !', $status, 200) :
            $this->errorResponse('Fail', 500);
    }

    private function validateRequest($req)
    {
        return Validator::make($req->all(), [
            'image' => 'required',
        ]);
    }
}
