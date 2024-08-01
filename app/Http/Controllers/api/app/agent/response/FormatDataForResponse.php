<?php

namespace App\Http\Controllers\api\app\agent\response;

use Carbon\Carbon;

trait FormatDataForResponse
{
    function formatForRenewal($renewed, $remain, $from, $to, $query)
    {
        $currentDate = Carbon::now();
        if ($from == null)
            $from = strtoupper($currentDate->format('M')) . '-' . $currentDate->format('y');

        if ($to == null)
            $to = strtoupper($currentDate->format('M')) . '-' . $currentDate->format('y');
        return [
            'data' => [
                'count' => [
                    'from_date' => $from,
                    'to_date' => $to,
                    'renewed' => count($renewed),
                    'remaining' => count($remain)
                ],
                "query" => $query,
                'detail' => [
                    'renewed' => $renewed,//$this->getAcceptedField($renewed_filter),
                    'remaining' => $remain //$this->getAcceptedField($remain_filter)
                ]
            ]
        ];
    }
    private function getAcceptedField($rows)
    {
        $fields = ['policy_no', 'customer_name', 'phone_number', 'product_name', 'expiry_date', 'status'];
        return collect($rows)
            ->map(function ($item) use ($fields) {
                return collect($item)
                    ->only($fields)
                    ->toArray();
            })
            ->values()
            ->all();
    }

    function formatForClaim($paid_rows, $open_rows, $outstanding, $closed_rows, $from, $to)
    {
        return [
            'data' => [
                'count' => [
                    'from_date' => $from,
                    'to_date' => $to,
                    'total' => count($paid_rows) + count($outstanding) + count($closed_rows),

                    'paid' => count($paid_rows),
                    'closed' => count($closed_rows),
                    'outstanding' => count($outstanding),
                    'open' => count($outstanding),
                ],
                'detail' => [
                    'paid' => $paid_rows,
                    'closed' => $closed_rows,
                    'outstanding' => $outstanding,
                    'open' => $outstanding,
                ]
            ]
        ];
    }
}


