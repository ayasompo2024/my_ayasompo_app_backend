<?php

namespace App\Http\Controllers\api\app\agent\filter;


trait FilterForRenewal
{
    function filterRenewed($renewal_query_result)
    {
        $collection = collect($renewal_query_result);
        return $collection->filter(function ($item) {
            return $item["status"] == 'RENEWED';
        })->values();
    }
    function filterRemaining($renewal_query_result)
    {
        $collection = collect($renewal_query_result);
        return $collection->filter(function ($item) {
            return $item["status"] != 'RENEWED';
        })->values();
    }
}