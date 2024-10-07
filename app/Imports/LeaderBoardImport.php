<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\LeaderBoard;
use App\Traits\RemoveInitialPlusNineFiveNine;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LeaderBoardImport implements ToCollection
{
    /**
     * @param  Collection  $collection
     */
    use RemoveInitialPlusNineFiveNine;

    public function collection(Collection $collection)
    {
        $filterRows = [];
        foreach ($collection->skip(1) as $rows) {
            $row = [
                'campaign_title' => $rows[1],
                'name' => $rows[2],
                'points' => $rows[3],
                'phone' => $this->removeInitialPlusNineFiveNine($rows[4]),
                'product_code' => $rows[5],
                'period_from' => $rows[6],
                'period_to' => $rows[7],
            ];
            array_push($filterRows, $row);
        }
        $this->saveToDB($filterRows);
    }

    private function saveToDB($filterRows)
    {
        foreach ($filterRows as $row) {
            if ($row['name'] != null) {
                $agent = $this->getAgentProfileByPhone($row['phone']);
                LeaderBoard::create([
                    'campaign_title' => $row['campaign_title'],
                    'name' => $row['name'],
                    'points' => $row['points'],
                    'phone' => $row['phone'],
                    'customer_id' => $agent ? $agent->id : 0,
                    'product_code' => $row['product_code'],
                    'period_from' => $row['period_from'],
                    'period_to' => $row['period_to'],
                ]);
            }
        }
    }

    private function getAgentProfileByPhone($phone)
    {
        return Customer::with('agentInfo')->where('customer_phoneno', $phone)->where('app_customer_type', 'AGENT')->first();
    }
}
