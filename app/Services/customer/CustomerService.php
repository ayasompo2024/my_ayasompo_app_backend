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

    function toggleDisabledById($id)
    {
        return CustomerRepository::toggleDisabledById($id);
    }
    function destroy($id)
    {
        return CustomerRepository::destroy($id);
    }

    //Ajax Response
    function previewBeforeResgister($request)
    {
        $risk_of_policy_lists = $request->risk_of_policy_list;
        $selectCustomerObj = $request->select_customer_obj;
        $isExistPhones = [];
        foreach ($risk_of_policy_lists as $risk_of_policy_list) {
            $customer = CustomerRepository::getAllByPhone("09" . $risk_of_policy_list["phone"]);
            $isExist = !empty($customer);
            $customerData = $isExist ? $customer->toArray() : null;
            array_push($isExistPhones, [
                'phone' => "09" . $risk_of_policy_list["phone"],
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
        foreach ($request->risk_of_policy_list as $risk_of_policy_list) {
            $customer = CustomerRepository::getAllByPhone($risk_of_policy_list["phone"]);
            if (count($customer) > 0)
                $this->callSMSAPI("09" . $risk_of_policy_list["phone"], $this->contentForExistingCustomer($request->policy_number));
            else
                $this->callSMSAPI("09" . $risk_of_policy_list["phone"], $this->contentForNotExistingCustomer($request->policy_number));
            array_push($recordedCustomer, $this->saveCustomerToDB($request->select_customer_obj, $risk_of_policy_list, $request->policy_number));
        }
        return $recordedCustomer;
    }
    private function saveCustomerToDB($select_customer_obj, $risk_of_policy_list, $policy_number)
    {
        $inputForAppCustomer = [
            "customer_code" => $select_customer_obj["customer_code"],
            "customer_phoneno" => "09" . $risk_of_policy_list["phone"],
            "risk_seqNo" => $risk_of_policy_list["risk_seqNo"],
            "risk_name" => $risk_of_policy_list["risk_name"],
            "app_customer_type" => AppCustomerType::GROUP->value,
            "policy_number" => $policy_number
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



    private function contentForExistingCustomer($policy_number)
    {
        return <<<EOT
Hello, It is from My AYA SOMPO. You have been invited to subscribe the AYA SOMPO policy and the number is $policy_number.

Please visit our app for your new policy benefits.

For any assistant, please reach out to our call center. +959777100555
EOT;

    }
    private function contentForNotExistingCustomer($policy_number)
    {
        return <<<EOT
Hello, It is from My AYA SOMPO. You have been invited to subscribe the AYA SOMPO policy and the number is $policy_number.

Please verify yourself by the link.
http://
            
For any assistant, please reach out to our call center. +959777100555
EOT;

    }
}

