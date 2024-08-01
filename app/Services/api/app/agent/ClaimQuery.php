<?php

namespace App\Services\api\app\agent;

use Carbon\Carbon;

trait ClaimQuery
{
    function closeQuery($account_code_string, $from, $to)
    {
        $baseQuery = "SELECT * FROM VW_POLICY_AGENT_CLAIM_APP WHERE STATUS IN ('Cancel','No Claim','Reject') AND ACCOUNT_CODE IN (" . $account_code_string . ")";

        if ($from == null) {
            $from = Carbon::now()->format('Y-m-d H:i:s');
        } else {
            $from = Carbon::createFromFormat('M-Y', $from)->startOfMonth();
        }

        $fromDate = Carbon::createFromFormat('Y-m-d H:i:s', $from);
        $formattedFromDate = strtoupper($fromDate->format('M-y'));
        if ($to == null) {
            return $baseQuery . " AND TO_CHAR(intimate_date, 'MON-YY') = '" . $formattedFromDate . "'";
        }

        $toDate = $from = Carbon::createFromFormat('M-Y', $to)->startOfMonth();
        if ($fromDate == $toDate) {
            return $baseQuery . " AND TO_CHAR(intimate_date, 'MON-YY') = '" . $formattedFromDate . "'";
        }
        return $this->queryForDateRange($fromDate, $toDate, $baseQuery, "TO_CHAR(intimate_date, 'MON-YY')");
    }

    function outstandingQuery($account_code_string, $from, $to)
    {
        $baseQuery = "SELECT * FROM VW_POLICY_AGENT_CLAIM_APP WHERE STATUS IN ('Open','Outstanding') AND ACCOUNT_CODE IN (" . $account_code_string . ")";

        if ($from == null) {
            $from = Carbon::now()->format('Y-m-d H:i:s');
        } else {
            $from = Carbon::createFromFormat('M-Y', $from)->startOfMonth();
        }

        $fromDate = Carbon::createFromFormat('Y-m-d H:i:s', $from);
        $formattedFromDate = strtoupper($fromDate->format('M-y'));
        if ($to == null) {
            return $baseQuery . " AND TO_CHAR(intimate_date, 'MON-YY') = '" . $formattedFromDate . "'";
        }

        $toDate = $from = Carbon::createFromFormat('M-Y', $to)->startOfMonth();
        if ($fromDate == $toDate) {
            return $baseQuery . " AND TO_CHAR(intimate_date, 'MON-YY') = '" . $formattedFromDate . "'";
        }
        return $this->queryForDateRange($fromDate, $toDate, $baseQuery, "TO_CHAR(intimate_date, 'MON-YY')");
    }

    function paidQuery($account_code_string, $from, $to)
    {
        $originalFromDate = $from;
        $baseQuery = "select * from VW_POLICY_AGENT_CLAIM_APP WHERE  PAID_STATUS = 'PAID' and ACCOUNT_CODE in (" . $account_code_string . " )";

        if ($from == null) {
            $from = Carbon::now()->format('M-d');
        }

        $fromDate = Carbon::createFromFormat('M-d', $from);
        $formattedFromDate = strtoupper($fromDate->format('M-d'));

        if ($to == null) {
            return $baseQuery . "and to_char(to_Date(PAID_DATE,'DD-MON-YY'),'MON-YY') in ('" . $formattedFromDate . "')";
        }

        $toDate = Carbon::createFromFormat('M-d', $to);
        if ($fromDate == $toDate) {
            return $baseQuery . "and to_char(to_Date(PAID_DATE,'DD-MON-YY'),'MON-YY') in ('" . $formattedFromDate . "')";
        }

        $mutedfromDate = Carbon::createFromFormat('M-Y', $originalFromDate)->startOfMonth();
        $mutedtoDate = $from = Carbon::createFromFormat('M-Y', $to)->startOfMonth();
        return $this->queryForDateRange($mutedfromDate, $mutedtoDate, $baseQuery, "to_char(to_Date(PAID_DATE,'DD-MON-YY'),'MON-YY')");
    }

    private function queryForDateRange($fromDate, $toDate, $baseQuery, $field)
    {
        $startYear = $fromDate->year;

        if ($fromDate->month == 5 || $fromDate->month == 7 || $fromDate->month == 10) {
            $startMonthFromStartYear = $fromDate->month - 1;
        } else {
            $startMonthFromStartYear = $fromDate->month;
        }

        $endYear = $toDate->year;
        if ($toDate->month == 5 || $toDate->month == 7 || $toDate->month == 10) {
            $endMonthOfFromEndYear = $toDate->month - 1;
        } else {
            $endMonthOfFromEndYear = $toDate->month;
        }

        $allYears = [];
        for ($year = $fromDate->year; $year <= $toDate->year; $year++) {
            $allYears[] = $year;
        }
        
        $removedFirstAndLastestAllYears = array_slice($allYears, 1, -1);

        $fistYearsAndMonth = $this->getMonthsInYearRange($startYear, $startMonthFromStartYear, 12);

        $fistYearsAndMonth = array_map(function ($month) {
            return "'" . $month . "'";
        }, $fistYearsAndMonth);

        $lastestYearsAndMonth = $this->getMonthsUntilEndMonth($endYear, $endMonthOfFromEndYear);
        $lastestYearsAndMonth = array_map(function ($month) {
            return "'" . $month . "'";
        }, $lastestYearsAndMonth);

        $middleYears = [];
        foreach ($removedFirstAndLastestAllYears as $middleYear) {
            $yearAndMonth = $this->getMonthsInYearRange($middleYear, 1, 12);
            $middleYears[] = $yearAndMonth;
        }

        $flatMiddleYears = array_merge(...$middleYears);
        $flatMiddleYears = array_map(function ($month) {
            return "'" . $month . "'";
        }, $flatMiddleYears);
        $flatAllYears = array_merge($fistYearsAndMonth, $flatMiddleYears, $lastestYearsAndMonth);

        $allYearsAsString = "(" . implode(",", $flatAllYears) . ")";

        return $baseQuery . " AND " . $field . " in " . $allYearsAsString;
    }


    private function getMonthsInYearRange($year, $start_month, $end_month)
    {
        $months = [];
        $startMonth = (int) $start_month;
        $endMonth = (int) $end_month;
        if ($startMonth >= 1 && $startMonth <= 12 && $endMonth >= 1 && $endMonth <= 12) {
            if ($endMonth >= $startMonth) {
                for ($month = $startMonth; $month <= $endMonth; $month++) {
                    $date = Carbon::create($year, $month, 1);
                    $months[] = strtoupper($date->format('M-y'));
                }
            }
        }
        return $months;
    }
    private function getMonthsUntilEndMonth($year, $end_month)
    {
        $months = [];
        $endMonth = (int) $end_month;
        if ($endMonth >= 1 && $endMonth <= 12) {
            for ($month = 1; $month <= $endMonth; $month++) {
                $date = Carbon::create($year, $month, 1);
                $months[] = strtoupper($date->format('M-y'));
            }
        }
        return $months;
    }
}
