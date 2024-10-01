<?php

namespace App\Services\api\app\agent;

use Carbon\Carbon;

trait PrepareQuery
{
    public function prepareMonthlySaleQuery($account_code_string, $from, $to)
    {
        if ($from != null && $to != null) {
            return 'SELECT * FROM Vw_Policy_Agent_Monthly_App WHERE ACCOUNT_CODE IN ('.$account_code_string.') AND receipt_date BETWEEN '."'".$from."'".' AND '."'".$to."'";
        }
        if ($from != null && $to == null) {
            return 'SELECT * FROM Vw_Policy_Agent_Monthly_App WHERE ACCOUNT_CODE IN ('.$account_code_string.') AND receipt_date BETWEEN '."'".$from."'".' AND '."'".$from."'";
        }

        return 'SELECT * FROM Vw_Policy_Agent_Monthly_App WHERE ACCOUNT_CODE IN ('.$account_code_string.')';
    }

    public function prepareQuarterlySaleQuery($account_code_string, $year)
    {
        $currentYear = date('Y');

        if ($year == null) {
            $year = $currentYear;
        }

        $allMonthAsString = $this->getAllMonthAsString($year);

        return 'SELECT * FROM Vw_Policy_Agent_Quarterly_App WHERE ACCOUNT_CODE IN ('.$account_code_string.') AND receipt_date IN ('.$allMonthAsString.')';
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

    public function prepareDashboardQuery($account_code_string, $from_date, $to_date)
    {
        $baseQuery = 'SELECT * FROM VW_POLICY_AGENT_SALE_APP WHERE ACCOUNT_CODE IN ('.$account_code_string.')';
        if ($from_date && $to_date) {
            $baseQuery .= $this->determineBaseOnDate($from_date, $to_date);
        }

        return $baseQuery;
    }

    private function determineBaseOnDate($from_date, $to_date)
    {
        $from = Carbon::parse($from_date);
        $to = Carbon::parse($to_date);

        $dayCount = $from->diffInDays($to) + 1;

        //If Selected Day <= 7
        if ($dayCount <= 7) {
            $fromFormatted = $from->format('Y-m-d'); // e.g., 2024-05-01
            $toFormatted = $to->format('Y-m-d');     // e.g., 2024-05-07

            return " AND RECEIPT_DATE BETWEEN TO_DATE('".$fromFormatted."', 'YYYY-MM-DD') AND TO_DATE('".$toFormatted."', 'YYYY-MM-DD')";
        }

        //For One Month
        if ($from->isSameMonth($to) && $from->isSameYear($to)) {
            $monthYear = $from->format('M-y'); // e.g., May-24

            return " AND to_char(RECEIPT_DATE, 'MON-YY') = '".strtoupper($monthYear)."'";
        }

        // Month Range
        if ($from->isSameYear($to)) {
            $monthsYears = [];
            for ($date = $from->copy(); $date->lte($to); $date->addMonth()) {
                $monthsYears[] = strtoupper($date->format('M-y'));
            }
            $monthsYearsString = implode("','", $monthsYears);

            return " AND to_char(RECEIPT_DATE, 'MON-YY') IN ('".$monthsYearsString."')";
        }

        //Years Range
        $years = [];
        for ($date = $from->copy(); $date->lte($to); $date->addYear()) {
            $years[] = strtoupper($date->format('Y')); // e.g., 2021, 2022
        }
        $yearsString = implode("','", $years);

        return " AND to_char(RECEIPT_DATE, 'YYYY') IN ('".$yearsString."')";
    }

    public function prepareAgentPointQuery($account_code_string, $leaderBoard)
    {
        return 'SELECT * FROM VW_POLICY_AGENT_SALE_APP WHERE ACCOUNT_CODE IN ('.$account_code_string.") AND pol_prd_code = '".$leaderBoard->product_code."' AND receipt_date BETWEEN '".$leaderBoard->period_from." 00:00:00' AND '".$leaderBoard->period_to." 23:59:59'";
    }
}

// if ($from_date && $to_date) {
//     $from_date = $from_date . " 00:00:00";
//     $to_date = $to_date . " 00:00:00";
//     return $baseQuery . " AND receipt_date BETWEEN " . "'" . $from_date . "'" . " AND " . "'" . $to_date . "'";
// }

// if ($from_date && !$to_date) {
//     $from_date = $from_date . " 00:00:00";
//     return $baseQuery . " AND receipt_date IN (" . "'" . $from_date . "')";
// }
// if (!$from_date && $to_date) {
//     $to_date = $to_date . " 00:00:00";
//     return $baseQuery . " AND receipt_date IN (" . "'" . $to_date . "')";
// }
