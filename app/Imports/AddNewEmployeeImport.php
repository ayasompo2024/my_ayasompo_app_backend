<?php

namespace App\Imports;

use App\Repositories\CustomerRepository;
use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\SendSms;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Http;
use App\Traits\WriteLogger;

class AddNewEmployeeImport implements ToCollection
{
    use RemoveInitialPlusNineFiveNine, SendSms,WriteLogger;
    public function collection(Collection $collection)
    {
        $filterRows = [];
        foreach ($collection->skip(1) as $rows) {
            $row = [
                "customer_phoneno" => $this->removeInitialPlusNineFiveNine($rows[1]),
                "user_name" => $rows[0],
                "app_customer_type" => "EMPLOYEE",
                "password" => uniqid(),
            ];
            array_push($filterRows, $row);
        }
        $this->saveToDB($filterRows);
    }

    public function saveToDB(array $filterRows)
    {
        foreach ($filterRows as $row) {
            $phone = $row["customer_phoneno"];
            $user_name = $row["user_name"];
            $password = $row["password"];
            $input = $row;
            $input["password"] = Hash::make($row["password"]);
            if (!CustomerRepository::isExistCustomerAsEmplyeeProfile($phone)) {
                $this->callSMSAPI($phone, $this->getContent($user_name,$phone, $password), $user_name);
                CustomerRepository::store($input);
                $this->callToCirlce($phone);
            }else{
                // echo "exit";
            }
        }
    }

    private function callToCirlce($customer_phoneno){
        $url = config('app.CIRCE_SERVER_BASE_URL') . 'api/register';
        // $this->writeLog("circle", "Request to  Circle Server (EMPLOYEE)", ["phone" => $customer_phoneno]);
        $response = Http::withOptions(['verify' => false])->post($url,  ["phone" => $customer_phoneno]);
        $data = $response->json();
        $this->writeLog("circle", "Response from Circle Server (EMPLOYEE)", $data);
    }

    private function getContent($username,$phone, $password)
    {
        return <<<EOT
Hello ! $username.   

You have been registered successfully in MY AYASOMPO App as a EMPLOYEE user.

Username : $username.
Phone : $phone.
Password : $password

Good luck!            
EOT;

    }
}
