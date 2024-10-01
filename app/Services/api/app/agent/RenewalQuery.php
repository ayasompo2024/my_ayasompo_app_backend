<?php

namespace App\Services\api\app\agent;

use Carbon\Carbon;

trait RenewalQuery
{
    public function remainingQuery($account_code_string, $from, $to)
    {
        $baseQuery = 'SELECT * FROM VW_POLICY_AGENT_RENEWAL_REMAINING WHERE  ACCOUNT_CODE IN ('.$account_code_string.')';

        if (! $from && ! $to) {
            return $baseQuery;
        }

        if ($from && $to == null) {
            return $baseQuery." AND TO_CHAR(period_to, 'MON-YY') = '".$from."'";
        }

        if ($from == $to) {
            return $baseQuery." AND TO_CHAR(period_to, 'MON-YY') = '".$from."'";
        }

        $date = $this->getDateFormat($from, $to);

        return "SELECT * FROM VW_POLICY_AGENT_RENEWAL_REMAINING WHERE period_to >= DATE '".$date['from']."' AND period_to <= DATE '".$date['to']."' AND ACCOUNT_CODE IN (".$account_code_string.')';
    }

    public function renewedQuery($account_code_string, $from, $to)
    {
        $baseQuery = 'SELECT * FROM VW_POLICY_AGENT_RENEWAL_RENEWED WHERE  ACCOUNT_CODE IN ('.$account_code_string.')';

        if (! $from && ! $to) {
            return $baseQuery;
        }

        if ($from && $to == null) {
            return $baseQuery." AND TO_CHAR(PERIOD_FROM, 'MON-YY') = '".$from."'";
        }

        if ($from == $to) {
            return $baseQuery." AND TO_CHAR(PERIOD_FROM, 'MON-YY') = '".$from."'";
        }
        $date = $this->getDateFormat($from, $to);

        return "SELECT * FROM VW_POLICY_AGENT_RENEWAL_RENEWED WHERE PERIOD_FROM >= DATE '".$date['from']."' AND PERIOD_FROM <= DATE '".$date['to']."' AND ACCOUNT_CODE IN (".$account_code_string.')';
    }

    public function getDateFormat($from, $to)
    {
        $fromDate = Carbon::createFromFormat('M-y', $from)->startOfMonth();
        $toDate = Carbon::createFromFormat('M-y', $to)->endOfMonth();

        $fromDate->year = $this->adjustYear($fromDate->year);
        $toDate->year = $this->adjustYear($toDate->year);

        return [
            'from' => $fromDate->format('Y-m-d'),
            'to' => $toDate->format('Y-m-d'),
        ];
    }

    public function adjustYear($year)
    {
        return $year >= 0 && $year <= 99 ? $year + 2000 : $year;
    }
}

/*
select * from VW_POLICY_AGENT_RENEWAL_REMAINING where to_char(period_to, 'MON-YY') in ( 'MAY-24')  and account_code in (  'Y-100-5002-53539','M-700-5002-53539','N-500-5002-53539' );
SELECT * FROM VW_POLICY_AGENT_RENEWAL_RENEWED WHERE ACCOUNT_CODE in ('Y-100-5002-53539','M-700-5002-53539','N-500-5002-53539' ) AND to_char(PERIOD_FROM, 'MON-YY') in ('JUN-24');

"from_date": "JUN-21",
"to_date": "JUN-24",
"renewed": 1917,
"remaining": 1708

*/
