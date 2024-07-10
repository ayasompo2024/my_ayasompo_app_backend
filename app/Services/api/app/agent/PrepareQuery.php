<?php

namespace App\Services\api\app\agent;

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

        $fromDate = Carbon::createFromFormat('M-y', $from); // Create Carbon instances from the given strings
        $toDate = Carbon::createFromFormat('M-y', $to)->endOfMonth();

        $fromFormattedDate = $fromDate->format('Y-m-01 00:00:00');
        $toFormattedDate = $toDate->format('Y-m-d H:i:s');
        return "SELECT * FROM VW_POLICY_AGENT_RENEWAL_APP WHERE ACCOUNT_CODE IN (" . $account_code_string . ") AND expiry_date BETWEEN " . "'" . $fromFormattedDate . "'" . " AND " . "'" . $toFormattedDate . "'";
    }

    function prepareClaimQuery($account_code_string, $from, $to)
    {
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

    function prepareMonthlySaleQuery($account_code_string, $from, $to)
    {
        if ($from != null && $to != null) {
            return "SELECT * FROM Vw_Policy_Agent_Monthly_App WHERE ACCOUNT_CODE IN (" . $account_code_string . ") AND receipt_date BETWEEN " . "'" . $from . "'" . " AND " . "'" . $to . "'";
        }
        if ($from != null && $to == null) {
            return "SELECT * FROM Vw_Policy_Agent_Monthly_App WHERE ACCOUNT_CODE IN (" . $account_code_string . ") AND receipt_date BETWEEN " . "'" . $from . "'" . " AND " . "'" . $from . "'";
        }
        return "SELECT * FROM Vw_Policy_Agent_Monthly_App WHERE ACCOUNT_CODE IN (" . $account_code_string . ")";
    }

    function prepareQuarterlySaleQuery($account_code_string, $year)
    {
        $currentYear = date('Y');

        if ($year == null)
            $year = $currentYear;

        $allMonthAsString = $this->getAllMonthAsString($year);
        return "SELECT * FROM Vw_Policy_Agent_Quarterly_App WHERE ACCOUNT_CODE IN (" . $account_code_string . ") AND receipt_date IN (" . $allMonthAsString . ")";
    }
    private function getAllMonthAsString($year)
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $formatted_month = sprintf("'%02d-%d'", $i, $year);
            $months[] = $formatted_month;
        }
        return implode(',', $months);
    }
    function prepareDashboardQuery($account_code_string, $from_date, $to_date)
    {
        $baseQuery = "SELECT * FROM VW_POLICY_AGENT_SALE_APP WHERE ACCOUNT_CODE IN (" . $account_code_string . ")";

        if (!$from_date && !$to_date) {
            return $baseQuery;
        }

        if ($from_date && $to_date) {
            $from_date = $from_date . " 00:00:00";
            $to_date = $to_date . " 00:00:00";
            return $baseQuery . " AND receipt_date BETWEEN " . "'" . $from_date . "'" . " AND " . "'" . $to_date . "'";
        }

        if ($from_date && !$to_date) {
            $from_date = $from_date . " 00:00:00";
            return $baseQuery . " AND receipt_date IN (" . "'" . $from_date . "')";
        }
        if (!$from_date && $to_date) {
            $to_date = $to_date . " 00:00:00";
            return $baseQuery . " AND receipt_date IN (" . "'" . $to_date . "')";
        }
    }
    function prepareAgentPointQuery($account_code_string, $leaderBoard)
    {
        return "SELECT * FROM VW_POLICY_AGENT_SALE_APP WHERE ACCOUNT_CODE IN (" . $account_code_string . ") AND pol_prd_code = '" . $leaderBoard->product_code . "' AND receipt_date BETWEEN '" . $leaderBoard->period_from . " 00:00:00' AND '" . $leaderBoard->period_to . " 23:59:59'";
    }
}
