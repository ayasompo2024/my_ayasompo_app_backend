<?php

namespace App\Services\api\app;

use App\Events\CustomerRegistered;
use App\Http\Resources\api\app\CustomerRsource;
use App\Http\Resources\api\app\RegisterCustomerRsource;
use App\Repositories\CustomerRepository;
use App\Repositories\DeviceTokenRepository;
use App\Traits\FileUpload;
use App\Traits\Firebase;
use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\SendPushNotification;
use App\Traits\WriteLogger;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    use FileUpload, Firebase, RemoveInitialPlusNineFiveNine, SendPushNotification, WriteLogger;

    public function register($request)
    {
        $this->writeLog('registerdata', 'Register Request Data', $request->all());
        $input = $request->only('customer_code', 'policy_number', 'user_name', 'device_token');
        $input['customer_phoneno'] = $this->removeInitialPlusNineFiveNine($request->customer_phoneno);
        $input['password'] = Hash::make($request['password']);
        $input['app_customer_type'] = $request->customer_type;
        $input['profile_photo'] = '/uploads/profile/user.jpg';
        $input['last_logined_at'] = now();
        $customer = CustomerRepository::store($input);
        $token = $customer->createToken('app_api_token')->accessToken;

        $dataForCoreCustomer['app_customer_id'] = $customer->id;
        $dataForCoreCustomer['request'] = $request;
        event(new CustomerRegistered($dataForCoreCustomer));

        return [
            'token' => $token,
            'customer' => new RegisterCustomerRsource($customer),
            'message' => null,
        ];
    }

    public function login($request)
    {
        $this->writeLog('login', 'Login Request Data', $request->all());
        $customer = CustomerRepository::getByPhone($this->removeInitialPlusNineFiveNine($request->customer_phoneno));
        if (empty($customer) || ! Hash::check($request->password, $customer->password)) {
            return false;
        }
        $notification = ['title' => 'Security Alert', 'body' => "You've been logged out !"];
        $data = ['title' => 'LOG_OUT_NOW', 'body' => null];

        // $this->sendNotification($customer->device_token, $notification['title'], $notification['body'], null, $data);
        // $this->logOutOldDevice($customer->device_token);

        return [
            'token' => $customer->is_disabled ? null : $customer->createToken('app_api_token')->accessToken,
            'customer' => $customer->is_disabled ? null : new CustomerRsource($customer),
        ];
    }

    // private function logOutOldDevice($token, $re)
    // {
    //     $notification = ['title' => 'Security Alert', 'body' => "You've been logged out !"];
    //     $data = ['title' => 'LOG_OUT_NOW', 'body' => null];
    //     $this->sendAsUnicast($token, $notification, $data);
    // }

    public function disabledProfile($user_id)
    {
        $status = CustomerRepository::disabledProfile($user_id);

        return $status ? ['messasge' => 'Please Connect Admin to recover your account'] : false;
    }

    public function updateProfilePhoto($request)
    {
        $upload_path = $this->uploadFile($request->photo, '/uploads/profile/', 'aya_sompo');
        CustomerRepository::update($request->user()->id, [
            'profile_photo' => $upload_path,
        ]);

        return $request->user();
    }

    public function updatePassword($request)
    {
        CustomerRepository::update(
            $request->user()->id,
            [
                'password' => Hash::make($request['password']),
            ]
        );

        return $request->user();
    }

    public function getProfileListByPhone($phone)
    {
        return CustomerRepository::getAllByProvidedPhone($this->removeInitialPlusNineFiveNine($phone));
    }

    public function isExistAccountByPhone($phone)
    {
        $isExistAnyAccount = CustomerRepository::getByPhone($phone);

        return $isExistAnyAccount ? 'Exist' : 'Phone not registered in our App ,Please First Register ';
    }

    public function resetPassword($phone, $password)
    {
        $customers = CustomerRepository::getAllByPhone($this->removeInitialPlusNineFiveNine($phone));
        if (! $customers) {
            return false;
        }
        foreach ($customers as $customer) {
            $customer->password = Hash::make($password);
            $customer->save();
        }

        return true;
    }

    private function storeDeviceToken($customer_id, $token)
    {
        $input = [
            'customer_id' => $customer_id,
            'token' => $token,
        ];
        DeviceTokenRepository::store($input);
    }
}
