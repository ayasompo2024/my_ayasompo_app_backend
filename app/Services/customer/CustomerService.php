<?php
namespace App\Services\customer;

use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Cache;
use App\Enums\AppCustomerType;
use App\Events\CustomerRegistered;

class CustomerService
{

    use CallAPI;
    function index($per_page)
    {
        return CustomerRepository::getWithPaginate($per_page);
    }
    function getAllCustomerByPhone($phone)
    {
        return CustomerRepository::getAllCustomerByPhone($phone);
    }
    function getCustomersListByPolicy($policy_no)
    {
        return $this->getCustomersListByPolicyAPICall($policy_no);
    }

    //Ajax Response
    function previewBeforeResgister($request)
    {
        $phoneNumberArray = $request->phone_number_array;
        $selectCustomerObj = $request->select_customer_obj;
        $isExistPhones = [];
        foreach ($phoneNumberArray as $individualPhone) {
            $customer = CustomerRepository::getAllByPhone($individualPhone);
            $isExist = !empty($customer);
            $customerData = $isExist ? $customer->toArray() : null;
            array_push($isExistPhones, [
                'phone' => $individualPhone,
                'appUsers' => $customerData
            ]);
        }
        return [
            'selectCustomerObj' => $selectCustomerObj,
            'phones' => $isExistPhones
        ];
    }

    //Ajax Response
    function register($request)
    {
        $recordedCustomer = [];
        foreach ($request->phone_number_array as $individualPhone) {
            $customer = CustomerRepository::getAllByPhone($individualPhone);
            if (count($customer) > 0)
                $this->callSMSAPI($individualPhone, $this->contentForExistingCustomer());
            else
                $this->callSMSAPI($individualPhone, $this->contentForNotExistingCustomer());
            array_push($recordedCustomer, $this->saveCustomerToDB($request->select_customer_obj, $individualPhone));
        }
        return $recordedCustomer;
    }
    private function saveCustomerToDB($select_customer_obj, $phone)
    {
        $inputForAppCustomer = [
            "customer_code" => $select_customer_obj["customer_code"],
            "customer_phoneno" => $phone,
            "app_customer_type" => AppCustomerType::GROUP->value
        ];
        $appCustomer = CustomerRepository::store($inputForAppCustomer);
        $inputForCoreCustomer = [
            'app_customer_id' => $appCustomer->id,
            "customer_code" => $select_customer_obj["customer_code"],
            "customer_type" => $select_customer_obj["customer_type"],
            "customer_name" => $select_customer_obj["customer_name"],
            "customer_phoneno" => $select_customer_obj["customer_phoneno"],
            "customer_nrc" => $select_customer_obj["customer_nrc"],
        ];
        event(new CustomerRegistered($inputForCoreCustomer));
        return $appCustomer;
    }

    private function contentForExistingCustomer()
    {
        return "ExistingCustomer";
    }
    private function contentForNotExistingCustomer()
    {
        return "Not Exist Customer";
    }
}

