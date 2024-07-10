<?php

namespace App\Http\Controllers\api\app;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
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

        $status = $customerService->register($request);
        $status ? $this->sendWelcomeNoti($request->device_token, $request->user_name) : '';
        return $status ? $this->successResponse("Register Success", $status, 201) :
            $this->errorResponse("Register Fail");
    }
    private function sendWelcomeNoti($token, $user_name)
    {
        $notification = ["title" => "Hello, " . $user_name . ", let's connect here.", "body" => null];
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
                return $this->errorResponse("Account Has been disabled ", 202);

            $this->lastLoginTime($status['customer']['customer_phoneno'], $request->device_token);
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
            "device_token" => 'nullable'
        ]);
    }

    private function lastLoginTime($phone, $device_token)
    {
        Customer::where("customer_phoneno", $phone)->update(
            [
                'last_logined_at' => now(),
                'device_token' => $device_token
            ]
        );
    }
}









