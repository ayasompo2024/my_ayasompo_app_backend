<?php

namespace App\Http\Controllers\api;

use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait Auth
{
    use ApiResponser;
    public function register(Request $request)
    {
        $validator = $this->registerValidation($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        // Create a new customer
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->successResponse("Regiister Success", [
            'token' => $customer->createToken('CustomerToken')->accessToken,
            'user' => $customer,
        ], 200);
    }


    public function login(Request $request)
    {

        $validator = $this->loginValidation($request);
        if ($validator->fails())
            return response()->json(['error' => $validator->errors()], 400);

        // Attempt to authenticate
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $customer = auth()->user();
            $token = $customer->createToken('CustomerToken')->accessToken;

            return response()->json(['access_token' => $token], 200);
        }
        return $this->respondUnAuthorized("Credentials Not Found");
    }

    private function registerValidation($request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:customers',
            'password' => 'required|string|min:6',
        ]);
    }

    private function loginValidation($request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    }


}

