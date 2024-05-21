<?php

namespace App\Http\Controllers\api\app\agent\filter;


trait FilterForClaim
{
    function open($claim_query_result)
    {
        $collection = collect($claim_query_result);
        return $collection->filter(function ($item) {
            return $item['status'] === 'Open';
        })->values();
    }
    function closed($claim_query_result)
    {
        $collection = collect($claim_query_result);
        return $collection->filter(function ($item) {
            return $item['status'] == 'Close Claim';
        })->values();
    }
    function paid($claim_query_result)
    {
        $collection = collect($claim_query_result);
        return $collection->filter(function ($item) {
            return $item['status'] == 'Paid';
        })->values();
    }
}
