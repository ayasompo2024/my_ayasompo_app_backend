<?php
namespace App\Services\customer;

use App\Events\CustomerRegistered;
use App\Http\Resources\api\app\RegisterCustomerRsource;
use App\Repositories\DeviceTokenRepository;
use Illuminate\Support\Facades\Hash;
use App\Repositories\CustomerRepository;

class CustomerService
{

    use CallAPI;
    function index($per_page)
    {
        return CustomerRepository::getWithPaginate($per_page);
    }
    function getCustomersListByPolicy($policy_no)
    {
        return $this->getCustomersListByPolicyAPICall($policy_no);
    }



    //Ajax Response
    function registerGroupCustomer($request)
    {
        return $request->all();
    }


    function unuse($request)
    {
        $input = $request->only("customer_code", "customer_phoneno", "user_name");
        $input['password'] = Hash::make($request['password']);
        $customer = CustomerRepository::store($input);
        $token = $customer->createToken('app_api_token')->accessToken;

        $coreCustomer = $request->only("customer_code", "customer_type", "customer_name", "customer_phoneno", "customer_nrc");
        $coreCustomer["app_customer_id"] = $customer->id;
        event(new CustomerRegistered($coreCustomer));

        // $this->storeDeviceToken($customer->id, $request->device_token);
        return [
            "token" => $token,
            "customer" => new RegisterCustomerRsource($customer)
        ];
    }

    // private function storeDeviceToken($customer_id, $token)
    // {
    //     $input = [
    //         "customer_id" => $customer_id,
    //         "token" => $token
    //     ];
    //     DeviceTokenRepository::store($input);
    // }

}




