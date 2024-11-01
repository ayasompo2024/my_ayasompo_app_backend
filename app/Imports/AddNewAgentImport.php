<?php

namespace App\Imports;

use App\Models\AgentAccountCode;
use App\Models\AgentInfo;
use App\Models\SmsPool;
use App\Repositories\CustomerRepository;
use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\SendSms;
use App\Traits\WriteLogger;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class AddNewAgentImport implements ToCollection
{
    use RemoveInitialPlusNineFiveNine, SendSms, WriteLogger;

    /**
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        $filterRows = [];
        foreach ($collection->skip(1) as $rows) {
            $row = [
                'user_name' => $rows[0],
                'customer_phoneno' => $this->removeInitialPlusNineFiveNine($rows[1]),
                'account_codes' => $rows[2],
                'agent_license' => $rows[3],
                'agent_type' => $rows[4],
                'expired_date' => $rows[5],
                'email' => $rows[6],
                'achievement' => $rows[7],
                'title' => $rows[8],
                'password' => Str::random(6),
            ];
            array_push($filterRows, $row);
        }
        $this->saveToDB($filterRows);
    }

    public function saveToDB(array $filterRows)
    {
        $pool = [];
        foreach ($filterRows as $row) {

            if ($row['user_name'] != null) {
                if (! CustomerRepository::isExistCustomerAsAgentProfile($row['customer_phoneno'])) {
                    $isExistFirstProfile = CustomerRepository::getFirstProfile($row['customer_phoneno']);
                    if ($isExistFirstProfile) {
                        array_push($pool, [
                            'name' => $row['user_name'],
                            'phone' => $row['customer_phoneno'],
                            'content' => $this->getContent($row['user_name'], $row['customer_phoneno'], 'You can login with existing password !'),
                        ]);
                        $password = $isExistFirstProfile['password'];
                        $device_token = $isExistFirstProfile['device_token'];
                    } else {
                        array_push($pool, [
                            'name' => $row['user_name'],
                            'phone' => $row['customer_phoneno'],
                            'content' => $this->getContent($row['user_name'], $row['customer_phoneno'], $row['password']),
                        ]);
                        $password = Hash::make($row['password']);
                        $device_token = null;
                    }

                    $createdAgentProfile = CustomerRepository::store($this->inputFroCustomerModel($row, $password, $device_token));
                    if ($createdAgentProfile) {
                        $this->storeAgentInfo($row, $createdAgentProfile['id']);
                        $this->storeAgentAccountCode($row['account_codes'], $createdAgentProfile['id']);
                    }
                }
            }
        }
        foreach ($pool as $item) {
            SmsPool::create([
                'name' => $item['name'],
                'phone' => $item['phone'],
                'content' => $item['content'],
                'key' => 'AGENT',
            ]);
        }
    }

    private function inputFroCustomerModel($row, $password, $device_token)
    {
        return [
            'customer_code' => $row['agent_license'],
            'customer_phoneno' => $row['customer_phoneno'],
            'user_name' => $row['user_name'],
            'app_customer_type' => 'AGENT',
            'password' => $password,
            'device_token' => $device_token,
        ];
    }

    private function storeAgentInfo($row, $profile_id)
    {
        $agentInfoInput = [
            'customer_id' => $profile_id,
            'agent_name' => $row['user_name'],
            'license_no' => $row['agent_license'],
            'agent_type' => $row['agent_type'],
            'expired_date' => $row['expired_date'],
            'email' => $row['email'],
            'achievement' => $row['achievement'],
            'title' => $row['title'],
        ];
        AgentInfo::create($agentInfoInput);
    }

    private function storeAgentAccountCode($accountCodeString, $profile_id)
    {
        $accountCodeArray = explode(',', $accountCodeString);
        foreach ($accountCodeArray as $code) {
            if ($code != null) {
                AgentAccountCode::create([
                    'customer_id' => $profile_id,
                    'code' => $code,
                ]);
            }
        }
    }

    private function callToCirlce($customer_phoneno)
    {
        $url = config('app.CIRCE_SERVER_BASE_URL').'api/register';
        $this->writeLog('circle_server', 'Request to Circle Server (EMPLOYEE)', ['phone' => $customer_phoneno]);
        $response = Http::withOptions(['verify' => false])->post($url, ['phone' => $customer_phoneno]);
        $data = $response->json();
        $this->writeLog('circle_server', 'Response from Circle Server (EMPLOYEE)', $data, false);
    }

    private function getContent($username, $phone, $password)
    {
        return <<<EOT
Hello ! $username.   

You have been registered successfully in MY AYASOMPO App as an AGENT user.

Phone : $phone.
Password : $password

EOT;

    }
}
