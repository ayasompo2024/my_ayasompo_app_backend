<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\app\CustomerRsource;
use App\Services\api\app\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    use Auth;

    public function profile(Request $request)
    {
        return $this->successResponse('Here are Profile', new CustomerRsource($request->user()), 201);
    }

    public function disabledProfile(Request $request, CustomerService $customerService)
    {
        $status = $customerService->disabledProfile($request->user()->id);

        return $status ? $this->successResponse('Disabled Profile Success', $status, 201) :
            $this->errorResponse('Disabled Profile  Fail');
    }

    public function updateProfilePhoto(Request $request, CustomerService $customerService)
    {
        $validator = $this->updateProfilePhotoValidation($request);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }

        $status = $customerService->updateProfilePhoto($request);

        return $status ? $this->successResponse('Profile Photo Update Success', new CustomerRsource($status), 201) :
            $this->errorResponse('Profile Update Fail');
    }

    public function updatePassword(Request $request, CustomerService $customerService)
    {
        $validator = $this->updatePasswordValidation($request);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }
        $status = $customerService->updatePassword($request);

        return $status ? $this->successResponse('Password  Update Success', new CustomerRsource($status), 201) :
            $this->errorResponse('Password Update Fail');
    }

    public function getProfileList(Request $request, CustomerService $customerService)
    {
        $targetPhone = $request->user()->customer_phoneno;

        return $this->successResponse('Get Profile List By Phone', CustomerRsource::collection($customerService->getProfileListByPhone($targetPhone)), 201);
    }

    public function isExistAccountByPhone(Request $request, CustomerService $customerService)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }

        return $customerService->isExistAccountByPhone($request->phone);
    }

    public function resetPassword(Request $request, CustomerService $customerService)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }
        $status = $customerService->resetPassword($request->phone, $request->password);

        return $status ? $this->successResponse('Password  Reset Success', [], 200) :
            $this->errorResponse('Password Reset Fail', 500);
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
