<?php

namespace App\Services\customer;

use App\Enums\AppCustomerType;
use App\Models\AgentAccountCode;
use App\Models\Customer;
use App\Models\SmsPool;
use App\Repositories\CustomerRepository;
use App\Traits\FileUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerService
{
    use CallAPI, FileUpload;

    public function index($per_page, $current_auth)
    {
        $role = $current_auth->role;

        if ($role == 'Root') {
            $customers = CustomerRepository::getWithPaginate($per_page);
        }

        if ($role == 'HR') {
            $customers = CustomerRepository::getOnlyEmployee($per_page);
        }

        if ($role == 'Admin') {
            $customers = CustomerRepository::getOnlyIndividual($per_page);
        }

        if ($role == 'Agent') {
            $customers = CustomerRepository::getOnlyAgent($per_page);
        }

        if ($role == 'Corporate') {
            $customers = CustomerRepository::getOnlyGroup($per_page);
        }

        return $customers;
    }

    //Update for Emplyee user
    public function update($id, $req)
    {
        $customer = Customer::with('employeeInfo')->find($id);
        $customer->customer_phoneno = $req->customer_phoneno;
        $customer->user_name = $req->user_name;

        if ($req->profile_photo) {
            $customer->profile_photo = $this->uploadFile($req->profile_photo, '/uploads/profile/', 'aya_sompo_');
        }

        if ($customer->app_customer_type == 'EMPLOYEE') {

            $customer->employeeInfo->code = $req['code'];
            $customer->employeeInfo->designation = $req['designation'];
            $customer->employeeInfo->department = $req['department'];
            $customer->employeeInfo->email = $req['email'];
            $customer->employeeInfo->office_phone = $req['office_phone'];
            $customer->employeeInfo->office_address = $req['office_address'];
            $customer->employeeInfo->save();
        }

        $customer->save();

        return $customer;
    }

    //Update for Agent user
    public function updateForAgent($id, $req)
    {
        $customer = Customer::with('agentInfo')->find($id);
        $customer->customer_phoneno = $req->customer_phoneno;
        $customer->user_name = $req->user_name;
        if ($req->profile_photo) {
            $customer->profile_photo = $this->uploadFile($req->profile_photo, '/uploads/profile/', 'aya_sompo_');
        }
        if ($customer->app_customer_type == 'AGENT') {
            $customer->agentInfo->agent_name = $req->agent_name;
            $customer->agentInfo->license_no = $req->license_no;
            $customer->agentInfo->agent_type = $req->agent_type;
            $customer->agentInfo->expired_date = $req->expired_date;
            $customer->agentInfo->email = $req->email;
            $customer->agentInfo->achievement = $req->achievement;
            $customer->agentInfo->title = $req->title;
            $customer->agentInfo->save();
        }
        $customer->save();

        return $customer;
    }

    public function deleteAgentCode($id)
    {
        return AgentAccountCode::destroy($id);
    }

    public function filterByType($type, $per_page)
    {
        return CustomerRepository::filterByType($type, $per_page);
    }

    public function getAllCustomerByPhone($phone)
    {
        return CustomerRepository::searchCustomerByPhone($phone);
    }

    public function getCustomersListByPolicy($policy_no)
    {
        return $this->getCustomersListByPolicyAPICall($policy_no);
    }

    public function toggleDisabledById($id)
    {
        return CustomerRepository::toggleDisabledById($id);
    }

    public function destroy($id)
    {
        return CustomerRepository::destroy($id);
    }

    //Ajax Response
    public function previewBeforeResgister($request)
    {
        $risk_of_policy_lists = $request->risk_of_policy_list;
        $selectCustomerObj = $request->select_customer_obj;
        $isExistPhones = [];
        foreach ($risk_of_policy_lists as $risk_of_policy_list) {
            $customer = Customer::where('app_customer_type', 'GROUP')->where('customer_phoneno', $risk_of_policy_list['phone'])->get();
            \Log::info($customer);
            $isExist = ! empty($customer);
            $customerData = $isExist ? $customer->toArray() : null;
            array_push($isExistPhones, [
                'phone' => $risk_of_policy_list['phone'],
                'appUsers' => $customerData,
            ]);
        }

        return [
            'selectCustomerObj' => $selectCustomerObj,
            'phones' => $isExistPhones,
        ];
    }

    //Ajax Response
    public function register($request)
    {
        set_time_limit(300); //
        // \Log::info($request->all());
        DB::beginTransaction();
        try {
            foreach ($request->risk_of_policy_list as $index => $risk_of_policy_list) {
                \Log::info('index', $risk_of_policy_list);
                if (! CustomerRepository::isExistCustomerAsRiskProfile($risk_of_policy_list['phone'])) {
                    $isExistFirstProfile = CustomerRepository::getFirstProfile($risk_of_policy_list['phone']);
                    if ($isExistFirstProfile) {
                        SmsPool::create(
                            $this->inputFroSmsPool(
                                $risk_of_policy_list['risk_name'],
                                $risk_of_policy_list['phone'],
                                $this->getContent($risk_of_policy_list['risk_name'], $risk_of_policy_list['phone'], 'You can login with existing password !'),
                                $request->policy_number
                            )
                        );

                        Customer::create(
                            $this->inputForCustomer(
                                $request->select_customer_obj,
                                $risk_of_policy_list,
                                $request->policy_number,
                                $isExistFirstProfile['password'],
                                $isExistFirstProfile['device_token']
                            )
                        );
                    } else {
                        $generate_password = Str::random(6);
                        SmsPool::create(
                            $this->inputFroSmsPool(
                                $risk_of_policy_list['risk_name'],
                                $risk_of_policy_list['phone'],
                                $this->getContent($risk_of_policy_list['risk_name'], $risk_of_policy_list['phone'], $generate_password),
                                $request->policy_number
                            )
                        );
                        $password = Hash::make($generate_password);

                        Customer::create(
                            $this->inputForCustomer(
                                $request->select_customer_obj,
                                $risk_of_policy_list,
                                $request->policy_number,
                                $password,
                                null
                            )
                        );
                    }
                }
            }
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::info($e);

            return $e->getMessage();
            // throw $e;
        }
    }

    private function inputFroSmsPool($name, $phone, $content, $policy_number)
    {
        return [
            'name' => $name,
            'phone' => $phone,
            'content' => $content,
            'policy_number' => $policy_number,
            'key' => 'GROUP',
        ];
    }

    private function inputForCustomer($select_customer_obj, $risk_of_policy_list, $policy_number, $password, $device_token)
    {
        $inputForAppCustomer = [
            'customer_code' => $select_customer_obj['customer_code'],
            'customer_phoneno' => $risk_of_policy_list['phone'],
            'risk_seqNo' => $risk_of_policy_list['risk_seqNo'],
            'risk_name' => $risk_of_policy_list['risk_name'],
            'app_customer_type' => AppCustomerType::GROUP->value,
            'policy_number' => $policy_number,
            'password' => $password,
            'user_name' => $risk_of_policy_list['risk_name'],
            'device_token' => $device_token,
            'user_id' => auth()->id(),
        ];

        return $inputForAppCustomer;
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

    private function getContent($username, $phone, $password)
    {
        return <<<EOT
Dear $username,   
Welcome to MY AYASOMPO App!
We're thrilled to have you on board. Explore our features, enjoy exclusive privileges, and make the most out of your experience. Here are your login details:

Phone no : $phone.
Password : $password

If you haven't downloaded the "My AYASOMPO" App yet, use the links below to get started:
For Android - https://play.google.com/store/apps/details?id=com.ml.ayasompo
For iOS - https://apps.apple.com/us/app/my-ayasompo/id6475663317
EOT;

    }
}
