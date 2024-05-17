<?php

namespace App\Http\Controllers\api\app\agent;

use Carbon\Carbon;
trait PrepareQuery
{
    function prepareRenewalQuery($account_code_string, $from, $to)
    {
        $currentDate = Carbon::now();
        if ($from == null)
            $from = strtoupper($currentDate->format('M')) . '-' . $currentDate->format('y');

        if ($to == null)
            $to = strtoupper($currentDate->format('M')) . '-' . $currentDate->format('y');
        return "SELECT * FROM VW_POLICY_AGENT_RENEWAL_APP WHERE ACCOUNT_CODE IN (" . $account_code_string . ") AND to_char(POL_AUTHORIZED_DATE, 'MON-YY') in ('" . $from . "','" . $to . "')";
    }
}
