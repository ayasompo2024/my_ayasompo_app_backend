<?php

namespace App\Http\Controllers\api\app;

use App\Models\Customer;
use App\Services\api\app\CustomerService;
use App\Services\FirebaseService;
use App\Traits\api\ApiResponser;
use App\Traits\SendPushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

trait Auth
{
    use ApiResponser, SendPushNotification;

    public function register(Request $request, CustomerService $customerService, FirebaseService $firebase)
    {
        $validator = $this->registerValidation($request);
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }

        $status = $customerService->register($request);

        if ($status) {
            $notification = ['title' => 'Hello, ' . $request->user_name . ", let's connect here.", 'body' => null];
            $data = ['title' => 'Register Success', 'body' => null];
            $firebase->sendNotification($request->device_token, $notification['title'], $notification['body'], $data);
            return $this->successResponse('Register Success', $status, 201);
        } else {
            return $this->errorResponse('Register Fail');
        }
    }

    public function login(Request $request, CustomerService $customerService, FirebaseService $firebase)
    {
        $validator = $this->loginValidation($request);

        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }

        $status = $customerService->login($request);

        if ($status) {
            if ($status['customer'] == null) {
                return $this->errorResponse('Account Has been disabled ', 202);
            }

            $this->lastLoginTime($status['customer']['customer_phoneno'], $request->device_token);
            $notification = ['title' => 'Hello, ' . $status['customer']['user_name'] . ", let's connect here.", 'body' => null];
            $data = ['title' => 'Register Success', 'body' => null];
            $firebase->sendNotification($request->device_token, $notification['title'], $notification['body'], $data);
            return $this->successResponse('Login Success', $status, 200);
        } else {
            return $this->respondUnAuthorized('Credentials Not Found');
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
            'policy_number' => 'required|max:255',
            'email' => 'nullable|string',
            'address' => 'nullable|string',
            'customer_nrc' => 'required|string',

            'user_name' => 'required|max:255',
            'password' => 'required|string|min:6|confirmed',
            'device_token' => 'required',
        ]);
    }

    private function loginValidation($request)
    {
        return Validator::make($request->all(), [
            'customer_phoneno' => 'required',
            'password' => 'required',
            'device_token' => 'nullable',
        ]);
    }

    private function lastLoginTime($phone, $device_token)
    {
        Customer::where('customer_phoneno', $phone)->update(
            [
                'last_logined_at' => now(),
                'device_token' => $device_token,
            ]
        );
    }
}
