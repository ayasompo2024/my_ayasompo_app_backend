<?php

namespace App\Http\Controllers\api\app;


use App\Services\api\app\CustomerService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait Auth
{
    use ApiResponser;
    function register(Request $request, CustomerService $customerService)
    {

        $validator = $this->registerValidation($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $status = $customerService->register($request);
        return $status ? $this->successResponse("Register Success", $status, 201) :
            $this->errorResponse("Register Fail");
    }

    function login(Request $request, CustomerService $customerService)
    {
        $validator = $this->loginValidation($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $status = $customerService->login($request);
        if ($status)
            return $this->successResponse("Login Success", $status, 200);
        return $this->respondUnAuthorized("Credentials Not Found");
    }

    private function registerValidation($request)
    {
        return Validator::make($request->all(), [
            'customer_code' => 'required|string',
            'customer_type' => 'required|string',
            'customer_name' => 'required|string',
            'customer_phoneno' => 'required|min:6|max:13|unique:customers,customer_phoneno',
            'customer_nrc' => 'required|string',
            'user_name' => 'required|max:255',
            'password' => 'required|string|min:6|confirmed',
            "device_token" => 'required'
        ]);
    }
    private function loginValidation($request)
    {
        return Validator::make($request->all(), [
            'customer_phoneno' => 'required',
            'password' => 'required',
            "device_token" => 'required'
        ]);
    }
}









