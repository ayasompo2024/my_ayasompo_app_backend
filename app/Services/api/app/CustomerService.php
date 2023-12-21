<?php
namespace App\Services\api\app;

use App\Events\CustomerRegistered;
use App\Http\Resources\api\app\RegisterCustomerRsource;
use App\Repositories\DeviceTokenRepository;
use Illuminate\Support\Facades\Hash;
use App\Repositories\CustomerRepository;
use App\Enums\AppCustomerType;
use App\Traits\FileUpload;

class CustomerService
{
    use FileUpload;
    function register($request)
    {
        $input = $request->only("customer_code", "customer_phoneno", "user_name", "device_token", "policy_number");
        $input['password'] = Hash::make($request['password']);
        $input['app_customer_type'] = AppCustomerType::INDIVIDUAL->value;
        $customer = CustomerRepository::store($input);
        $token = $customer->createToken('app_api_token')->accessToken;

        $coreCustomer = $request->only("customer_code", "customer_type", "customer_name", "customer_phoneno", "customer_nrc");
        $coreCustomer["app_customer_id"] = $customer->id;
        event(new CustomerRegistered($coreCustomer));
        return [
            "token" => $token,
            "customer" => new RegisterCustomerRsource($customer),
            "message" => null,
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
        return [
            "token" => $customer->is_disabled ? null : $token,
            "customer" => $customer->is_disabled ? null : new RegisterCustomerRsource($customer)
        ];
    }
    function disabledProfile($user_id)
    {
        $status = CustomerRepository::disabledProfile($user_id);
        return $status ? ["messasge" => "Please Connect Admin to recover your account"] : false;
    }
    function updateProfilePhoto($request)
    {
        $upload_path = $this->uploadFile($request->photo, '/uploads/profile/', 'aya_sompo');
        CustomerRepository::update($request->user()->id, [
            'profile_photo' => $upload_path
        ]);
        return $request->user();
    }
    function updatePassword($request)
    {
        CustomerRepository::update(
            $request->user()->id,
            [
                'password' => Hash::make($request['password'])
            ]
        );
        return $request->user();
    }

    function getProfileListByPhone($phone)
    {
        return CustomerRepository::getAllByProvidedPhone($phone);
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




