<?php

namespace App\Imports;


use App\Models\AgentAccountCode;
use App\Models\AgentInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use App\Repositories\CustomerRepository;
use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\SendSms;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Traits\WriteLogger;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
class AddNewAgentImport implements ToCollection
{
    use RemoveInitialPlusNineFiveNine, SendSms, WriteLogger;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        $filterRows = [];
        foreach ($collection->skip(1) as $rows) {
            $row = [

                "user_name" => $rows[0],
                "customer_phoneno" => $this->removeInitialPlusNineFiveNine($rows[1]),
                "account_codes" => $rows[2],
                'agent_license' => $rows[3],
                'agent_type' => $rows[4],
                'expired_date' => $rows[5],
                'email' => $rows[6],
                'achievement' => $rows[7],
                "password" => Str::random(6)
            ];
            array_push($filterRows, $row);
        }
        // dd($filterRows);
        $this->saveToDB($filterRows);
    }

    public function saveToDB(array $filterRows)
    {
        foreach ($filterRows as $row) {

            if ($row["user_name"] != null) {
                if (!CustomerRepository::isExistCustomerAsAgentProfile($row["customer_phoneno"])) {
                    $isExistFirstProfile = CustomerRepository::getFirstProfile($row["customer_phoneno"]);
                    if ($isExistFirstProfile) {
                        $this->callSMSAPI($row["customer_phoneno"], $this->getContent($row["user_name"], $row["customer_phoneno"], "You can login with existing password !"), $row["user_name"]);
                        $password = $isExistFirstProfile['password'];
                    } else {
                        $this->callSMSAPI($row["customer_phoneno"], $this->getContent($row["user_name"], $row["customer_phoneno"], $row["password"]), $row["user_name"]);
                        $password = Hash::make($row["password"]);
                    }

                    $createdAgentProfile = CustomerRepository::store($this->inputFroCustomerModel($row, $password));
                    if ($createdAgentProfile) {
                        $this->storeAgentInfo($row, $createdAgentProfile['id']);
                        $this->storeAgentAccountCode($row['account_codes'], $createdAgentProfile['id']);
                    }
                    $this->callToCirlce($row["customer_phoneno"]);
                }
            }
        }
    }

    private function inputFroCustomerModel($row, $password)
    {
        return [
            'customer_code' => $row['agent_license'],
            'customer_phoneno' => $row['customer_phoneno'],
            'user_name' => $row['user_name'],
            'app_customer_type' => 'AGENT',
            'password' => $password
        ];
    }

    private function storeAgentInfo($row, $profile_id)
    {
        $agentInfoInput = [
            "customer_id" => $profile_id,
            "agent_name" => $row['user_name'],
            "license_no" => $row['agent_license'],
            "agent_type" => $row['agent_type'],
            "expired_date" => $row['expired_date'],
            "email" => $row['email'],
            "achievement" => $row['achievement'],
        ];
        AgentInfo::create($agentInfoInput);
    }
    private function storeAgentAccountCode($accountCodeString, $profile_id)
    {
        $accountCodeArray = explode(',', $accountCodeString);
        foreach ($accountCodeArray as $code) {
            AgentAccountCode::create([
                'customer_id' => $profile_id,
                'code' => $code
            ]);
        }
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

You have been registered successfully in MY AYASOMPO App as a AGENT user.

Username : $username.
Phone : $phone.
Password : $password

Good luck!            
EOT;

    }
}








