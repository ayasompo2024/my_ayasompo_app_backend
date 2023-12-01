<?php

namespace App\Http\Controllers\api\app;

use App\Services\api\app\CustomerService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    use Auth;
    public function profile(Request $request)
    {
        $user = $request->user();
        return response()->json(['user' => $user]);
    }

    function updateProfilePhoto(Request $request, CustomerService $customerService)
    {
        $validator = $this->updateProfilePhotoValidation($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $status = $customerService->updateProfilePhoto($request);
        return $status ? $this->successResponse("Profile Update Success", $status, 201) :
            $this->errorResponse("Profile Update Fail");
    }

    private function updateProfilePhotoValidation($request)
    {
        return Validator::make($request->all(), [
            'photo' => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG'],
        ]);
    }
}