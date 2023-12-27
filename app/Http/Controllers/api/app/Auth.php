<?php

namespace App\Http\Controllers\api\app;


use App\Services\api\app\CustomerService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Traits\SendPushNotification;

trait Auth
{
    use ApiResponser, SendPushNotification;
    function register(Request $request, CustomerService $customerService)
    {
        $validator = $this->registerValidation($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $this->sendWelcomeNoti($request->device_token, $request->user_name);
        $status = $customerService->register($request);
        return $status ? $this->successResponse("Register Success", $status, 201) :
            $this->errorResponse("Register Fail");
    }
    private function sendWelcomeNoti($token, $user_name)
    {
        $notification = ["title" => "Hello," . $user_name . ", let's connect here.", "body" => null];
        $data = ["title" => "Register Success", "body" => null];
        $this->sendAsUnicast($token, $notification, $data);
    }
    function login(Request $request, CustomerService $customerService)
    {
        $validator = $this->loginValidation($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);
        $status = $customerService->login($request);
        if ($status) {
            if ($status["customer"] == null)
                return $this->errorResponse("Account Has been disabled ", 204);
        }
        if ($status) {
            $this->sendWelcomeNoti($request->device_token, $status["customer"]["user_name"]);
            return $this->successResponse("Login Success", $status, 200);
        } else {
            return $this->respondUnAuthorized("Credentials Not Found");
        }

    }

    private function registerValidation($request)
    {
        return Validator::make($request->all(), [
            'customer_code' => 'required|string',
            'customer_type' => 'required|string',
            'customer_name' => 'required|string',
            'customer_phoneno' => [
                'required',
                'min:6',
                'max:13',
                Rule::unique('customers', 'customer_phoneno')->where(function ($query) {
                    $query->where('app_customer_type', 'INDIVIDUAL');
                }),
            ],
            "policy_number" => 'required|max:255',
            "email" => 'nullable|string',
            'address' => 'nullable|string',
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









