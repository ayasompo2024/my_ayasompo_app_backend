<?php

namespace App\Imports;

use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\SendSms;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AddNewEmployeeImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    use RemoveInitialPlusNineFiveNine, SendSms;
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
            // $this->callSMSAPI($phone, $this->getContent($user_name, $password), $user_name);
            var_dump($row);
            
        }
    }
    private function getContent($username, $password)
    {
        return <<<EOT
Hello ! $username.        
You have been registered successfully in MY AYASOMPO app as a EMPLOYEE user.

Username : $username.
Password : $password

Good luck!            
EOT;

    }


}
