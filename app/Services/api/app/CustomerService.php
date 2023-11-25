<?php
namespace App\Services\api\app;

use App\Events\CustomerRegistered;
use App\Http\Resources\api\app\RegisterCustomerRsource;
use App\Repositories\DeviceTokenRepository;
use Illuminate\Support\Facades\Hash;
use App\Repositories\CustomerRepository;
use App\Enums\AppCustomerType;

class CustomerService
{
    function register($request)
    {
        $input = $request->only("customer_code", "customer_phoneno", "user_name", "device_token");
        $input['password'] = Hash::make($request['password']);
        $input['app_customer_type'] = AppCustomerType::INDIVIDUAL->value;
        $customer = CustomerRepository::store($input);
        $token = $customer->createToken('app_api_token')->accessToken;

        $coreCustomer = $request->only("customer_code", "customer_type", "customer_name", "customer_phoneno", "customer_nrc");
        $coreCustomer["app_customer_id"] = $customer->id;
        event(new CustomerRegistered($coreCustomer));
        return [
            "token" => $token,
            "customer" => new RegisterCustomerRsource($customer)
        ];
    }
    function login($request)
    {
        $customer = CustomerRepository::getByPhone($request->customer_phoneno);
        if (empty($customer) || !Hash::check($request->password, $customer->password))
            return false;
        $token = $customer->createToken('app_api_token')->accessToken;
        $customer->device_token = $request->device_token;
        $customer->save();
        // $this->storeDeviceToken($customer->id, $request->device_token);
        return [
            "token" => $token,
            "customer" => new RegisterCustomerRsource($customer)
        ];
    }
    private function storeDeviceToken($customer_id, $token)
    {
        $input = [
            "customer_id" => $customer_id,
            "token" => $token
        ];
        DeviceTokenRepository::store($input);
    }

}




