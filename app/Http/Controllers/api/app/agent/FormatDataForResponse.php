<?php

namespace App\Http\Controllers\api\app\agent;

use Carbon\Carbon;

trait FormatDataForResponse
{
    function formatForRenewal($row)
    {
        return $row;
    }

    function formatForClaim($row)
    {
        return $row;
    }
}
