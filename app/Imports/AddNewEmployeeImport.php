<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\EmployeeInfo;
use App\Models\SmsPool;
use App\Repositories\CustomerRepository;
use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\SendSms;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Http;
use App\Traits\WriteLogger;
use Illuminate\Support\Str;

class AddNewEmployeeImport implements ToCollection
{
    use RemoveInitialPlusNineFiveNine, SendSms, WriteLogger;

    public function collection(Collection $collection)
    {
        $filterRows = [];
        foreach ($collection->skip(1) as $rows) {
            $row = [
                "user_name" => $rows[0],
                "code" => $rows[1],
                "designation" => $rows[2],
                "department" => $rows[3],
                "email" => $rows[4],
                "customer_phoneno" => $this->removeInitialPlusNineFiveNine($rows[5]),
                "office_phone" => $rows[6],
                "office_address" => $rows[7],

                "app_customer_type" => "EMPLOYEE",
                "password" => Str::random(6)
            ];
            array_push($filterRows, $row);
        }
        $this->saveToDB($filterRows);
    }

    public function saveToDB(array $filterRows)
    {
        $pool = [];
        foreach ($filterRows as $row) {
            if ($row["user_name"] != null) {
                $phone = $row["customer_phoneno"];
                $user_name = $row["user_name"];
                $password = $row["password"];
                $input = $row;

                if (!CustomerRepository::isExistCustomerAsEmplyeeProfile($phone)) {
                    $isExistFirstProfile = CustomerRepository::getFirstProfile($phone);
                    if ($isExistFirstProfile) {
                        array_push($pool, [
                            'name' => $row["user_name"],
                            'phone' => $phone,
                            'content' => $this->getContent($user_name, $phone, "You can login with existing password !")
                        ]);
                        $input["password"] = $isExistFirstProfile['password'];
                        $input['device_token'] = $isExistFirstProfile['device_token'];
                    } else {
                        array_push($pool, [
                            'name' => $row["user_name"],
                            'phone' => $phone,
                            'content' => $this->getContent($user_name, $phone, $password)
                        ]);
                        $input["password"] = Hash::make($row["password"]);
                    }
                    $createdEmployee = Customer::create($input);
                    $employeeInfo = [
                        "customer_id" => $createdEmployee->id,
                        "code" => $row['code'],
                        'designation' => $row['designation'],
                        'department' => $row['department'],
                        'email' => $row['email'],
                        'office_phone' => $row['office_phone'],
                        'office_address' => $row['office_address']
                    ];
                    EmployeeInfo::create($employeeInfo);
                }
            }
        }
        foreach ($pool as $item) {
            SmsPool::create([
                'name' => $item['name'],
                'phone' => $item['phone'],
                'content' => $item['content'],
                'key' => "EMPLOYEE"
            ]);
        }
    }

    private function resetPassword($phone, $password)
    {
        $customers = CustomerRepository::getAllByPhone($this->removeInitialPlusNineFiveNine($phone));
        if (!$customers)
            return false;
        foreach ($customers as $customer) {
            $customer->password = Hash::make($password);
            $customer->save();
        }
        return true;
    }
    private function callToCirlce($customer_phoneno)
    {
        $url = config('app.CIRCE_SERVER_BASE_URL') . 'api/register';
        $this->writeLog("circle_server", "Request to Circle Server (EMPLOYEE)", ['phone' => $customer_phoneno]);
        $response = Http::withOptions(['verify' => false])->post($url, ["phone" => $customer_phoneno]);
        $data = $response->json();
        $this->writeLog("circle_server", "Response from Circle Server (EMPLOYEE)", $data, false);
    }

    private function getContent($username, $phone, $password)
    {
        return <<<EOT
Hello ! $username.   

You have been registered successfully in MY AYASOMPO App as a EMPLOYEE user.

Phone : $phone.
Password : $password

EOT;

    }
}
