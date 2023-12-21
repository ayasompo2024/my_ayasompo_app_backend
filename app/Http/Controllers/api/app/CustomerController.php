<?php

namespace App\Http\Controllers\api\app;

use App\Services\api\app\CustomerService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\api\app\CustomerRsource;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    use Auth;
    public function profile(Request $request)
    {
        return $this->successResponse("Here are Profile", new CustomerRsource($request->user()), 201);
    }
    public function disabledProfile(Request $request, CustomerService $customerService)
    {
        $status = $customerService->disabledProfile($request->user()->id);
        return $status ? $this->successResponse("Disabled Profile Success", $status, 201) :
            $this->errorResponse("Disabled Profile  Fail");
    }
    function updateProfilePhoto(Request $request, CustomerService $customerService)
    {
        $validator = $this->updateProfilePhotoValidation($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $status = $customerService->updateProfilePhoto($request);
        return $status ? $this->successResponse("Profile Photo Update Success", new CustomerRsource($status), 201) :
            $this->errorResponse("Profile Update Fail");
    }

    function updatePassword(Request $request, CustomerService $customerService)
    {
        $validator = $this->updatePasswordValidation($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);
        $status = $customerService->updatePassword($request);
        return $status ? $this->successResponse("Password  Update Success", new CustomerRsource($status), 201) :
            $this->errorResponse("Password Update Fail");
    }

    function getProfileList(Request $request, CustomerService $customerService)
    {
        $targetPhone = $request->user()->customer_phoneno;
        return $this->successResponse("Get Profile List By Phone", CustomerRsource::collection($customerService->getProfileListByPhone($targetPhone)), 201);
    }

    private function updatePasswordValidation($request)
    {
        return Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    private function updateProfilePhotoValidation($request)
    {
        return Validator::make($request->all(), [
            'photo' => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG'],
        ]);
    }


}