<?php

namespace App\Services\api\app\agent;

use Carbon\Carbon;

trait RenewalQuery
{
    function remainingQuery($account_code_string, $from, $to)
    {
        $baseQuery = "SELECT * FROM VW_POLICY_AGENT_RENEWAL_REMAINING WHERE  ACCOUNT_CODE IN (" . $account_code_string . ")";

        if ($from == null) {
            $from = Carbon::now()->format('Y-m-d H:i:s');
        } else {
            $from = Carbon::createFromFormat('M-Y', $from)->startOfMonth();
        }

        $fromDate = Carbon::createFromFormat('Y-m-d H:i:s', $from);
        $formattedFromDate = strtoupper($fromDate->format('M-y'));
        if ($to == null) {
            return $baseQuery . " AND TO_CHAR(period_to, 'MON-YY') = '" . $formattedFromDate . "'";
        }

        $toDate = $from = Carbon::createFromFormat('M-Y', $to)->startOfMonth();
        if ($fromDate == $toDate) {
            return $baseQuery . " AND TO_CHAR(period_to, 'MON-YY') = '" . $formattedFromDate . "'";
        }

        return $this->queryForDateRange($fromDate, $toDate, $baseQuery, "TO_CHAR(period_to, 'MON-YY')");
    }
    function renewedQuery($account_code_string, $from, $to)
    {
        $baseQuery = "SELECT * FROM VW_POLICY_AGENT_RENEWAL_RENEWED WHERE  ACCOUNT_CODE IN (" . $account_code_string . ")";
        if ($from == null) {
            $from = Carbon::now()->format('Y-m-d H:i:s');
        } else {
            $from = Carbon::createFromFormat('M-Y', $from)->startOfMonth();
        }

        $fromDate = Carbon::createFromFormat('Y-m-d H:i:s', $from);
        $formattedFromDate = strtoupper($fromDate->format('M-y'));
        if ($to == null) {
            return $baseQuery . " AND TO_CHAR(PERIOD_FROM, 'MON-YY') = '" . $formattedFromDate . "'";
        }

        $toDate = $from = Carbon::createFromFormat('M-Y', $to)->startOfMonth();
        if ($fromDate == $toDate) {
            return $baseQuery . " AND TO_CHAR(PERIOD_FROM, 'MON-YY') = '" . $formattedFromDate . "'";
        }

        return $this->queryForDateRange($fromDate, $toDate, $baseQuery, "TO_CHAR(PERIOD_FROM, 'MON-YY')");
    }
}