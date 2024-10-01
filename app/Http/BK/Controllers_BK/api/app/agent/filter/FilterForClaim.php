<?php

namespace App\Http\Controllers\api\app\agent\filter;

trait FilterForClaim
{
    public function open($claim_query_result)
    {
        $collection = collect($claim_query_result);

        return $collection->filter(function ($item) {
            return $item['status'] == 'Open';
        })->values();
    }

    public function outstanding($claim_query_result)
    {
        $collection = collect($claim_query_result);

        return $collection->filter(function ($item) {
            return $item['status'] == 'Outstanding';
        })->values();
    }

    public function closed($claim_query_result)
    {
        $collection = collect($claim_query_result);

        return $collection->filter(function ($item) {
            return $item['status'] == 'Close Claim';
        })->values();
    }

    public function paid($claim_query_result)
    {
        $collection = collect($claim_query_result);

        return $collection->filter(function ($item) {
            return $item['paid_status'] == 'PAID';
        })->values();
    }
}
