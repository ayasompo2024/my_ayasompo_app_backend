<?php

namespace App\Services\api\app\agent;

use Carbon\Carbon;

trait RenewalQuery
{
    function paidQuery($account_code_string, $from, $to)
    {
        return "select * from VW_POLICY_AGENT_CLAIM_APP WHERE  PAID_STATUS = 'PAID' and ACCOUNT_CODE in ('Y-100-5002-53539','M-700-5002-53539','N-500-5002-53539' ) and to_Date(PAID_DATE,'dd-MON-yy') >= '01-JUN-24' and to_date(PAID_DATE,'dd-MON-yy') <= '30-JUN-24' ";
        $currentDate = Carbon::now();
        if ($from == null)
            $from = strtoupper($currentDate->format('M')) . '-' . $currentDate->format('y');

        if ($to == null)
            $to = strtoupper($currentDate->format('M')) . '-' . $currentDate->format('y');

        $fromDate = Carbon::createFromFormat('M-y', $from); // Create Carbon instances from the given strings
        $toDate = Carbon::createFromFormat('M-y', $to)->endOfMonth();

        $fromFormattedDate = $fromDate->format('Y-m-01 00:00:00');
        $toFormattedDate = $toDate->format('Y-m-d H:i:s');
        return "SELECT * FROM VW_POLICY_AGENT_CLAIM_APP WHERE ACCOUNT_CODE IN (" . $account_code_string . ") AND intimate_date BETWEEN " . "'" . $fromFormattedDate . "'" . " AND " . "'" . $toFormattedDate . "'";
    }
}