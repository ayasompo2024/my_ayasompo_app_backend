<?php

namespace App\Http\Controllers\api\app\agent\response;

use Carbon\Carbon;

trait FormatDataForResponse
{
    function formatForRenewal($renewed_filter, $remain_filter, $from, $to)
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
                    'renewed' => count($renewed_filter),
                    'remaining' => count($remain_filter)
                ],
                'detail' => [
                    'renewed' => $this->getAcceptedField($renewed_filter),
                    'remaining' => $this->getAcceptedField($remain_filter)
                ]
            ]
        ];
    }
    private function getAcceptedField($rows)
    {
        $fields = ['policy_no', 'customer_name', 'phone_number', 'product_name', 'expiry_date','status'];
        return collect($rows)
            ->map(function ($item) use ($fields) {
                return collect($item)
                    ->only($fields)
                    ->toArray();
            })
            ->values()
            ->all();
    }

    function formatForClaim($paid_rows, $open_rows, $closed_rows, $from, $to)
    {
        return [
            'data' => [
                'count' => [
                    'from_date' => $from,
                    'to_date' => $to,
                    'total' => count($paid_rows) + count($open_rows) + count($closed_rows),
                    'paid' => count($paid_rows),
                    'open' => count($open_rows),
                    'closed' => count($closed_rows)
                ],
                'detail' => [
                    'opened_claim' => [],
                    'paid_claim' => [],
                    'closed_claim' => []
                ]
            ]
        ];
    }
}


