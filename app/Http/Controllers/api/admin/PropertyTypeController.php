<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Services\PropertyTypService;
use App\Traits\api\ApiResponser;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyTypeController extends Controller
{
    use ApiResponser, FileUpload;

    public function getAll(PropertyTypService $propertyTypService)
    {
        $property = $propertyTypService->getAll();

        return $this->successResponse('Properties', $property, 200);
    }

    public function store(Request $request, PropertyTypService $propertyTypService)
    {
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }
        $status = $propertyTypService->store($request);

        return $status ?
            $this->successResponse('Created !', $status, 200) :
            $this->errorResponse('Fail', 500);
    }

    public function update(Request $request, $id, PropertyTypService $propertyTypService)
    {
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }

        $status = $propertyTypService->update($id, $request);

        return $status ?
            $this->successResponse('Updated !', $status, 200) :
            $this->errorResponse('Fail', 500);
    }

    private function validateRequest($req)
    {
        return Validator::make($req->all(), [
            'name' => 'required',
        ]);
    }
}
