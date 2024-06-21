<?php
namespace App\Services\api\app\agent\response;

use App\Http\Resources\api\app\agent\LeaderBoardResource;

trait LeaderBoardResponse
{
    function leaderBoardRes($learders, $show_raw)
    {
        $premium = $this->collection->sum("premium");
        return [
            'campaign_title' => $learders[0]['campaign_title'],
            'current_point' => $premium ? ($premium / 1000) : 0,
            'learder_agents' => LeaderBoardResource::collection($learders),
            'show_raw_data' => !empty($show_raw) ? $this->collection : null
        ];
    }
}

/*
"pol_period_from": "2023-07-01 00:00:00",
"pol_period_to": "2023-10-01 00:00:00",
"pol_prd_code": "MUH",
 premium / 1000

{
    "class_name": "MOTOR INSURANCE",
    "product_name": "COMPREHENSIVE DUAL PURPOSE CAR (USD)",
    "pol_seq_no": "00YGN2300493998",
    "pol_cla_code": "MT",
    "branch": "YGN",
    "product": "MOTOR",
    "pol_policy_no": "AYA/YGN/MUH/23000001",
    "pol_proposal_no": "PR/YGN/MUH/23000001",
    "pol_period_from": "2023-07-01 00:00:00",
    "pol_period_to": "2023-10-01 00:00:00",
    "pol_prd_code": "MUH",
    "pol_date": "2023-07-13 15:31:26",
    "pol_authorized_date": "2023-07-13 15:31:26",
    "pol_type": "Renewals",
    "pol_transaction_type": "R",
    "pol_sum_insured": "50000",
    "pol_premium": "2285",
    "premium": "1680000",
    "pol_currency": "USD",
    "currency_rate": "2100",
    "pol_status": "4",
    "account_code": "Y-100-9007-90012",
    "pol_cus_code": "C000049840",
    "cus_code": "C000049840",
    "customer_type": "CORPORATE",
    "insured_name": "MARUBENI CORPORATION (YANGON BRANCH)",
    "phone_1": "09979121084",
    "phone_2": null,
    "account_handler": "SOMPO BUSINESS NON-MOTOR",
    "agent_name": "YANGON BRANCH",
    "agent_contact_no": null,
    "agent_email": null,
    "receipt_date": "2023-07-17 00:00:00"
}
*/
// SELECT * FROM VW_POLICY_AGENT_SALE_APP WHERE ACCOUNT_CODE IN ('Y-100-9007-90012','Y-103-1003-10215') AND pol_prd_code = 'MUH' AND pol_period_from >= '2023-07-01 00:00:00' AND pol_period_to <= '2023-10-01 00:00:00'
// SELECT * FROM VW_POLICY_AGENT_SALE_APP WHERE ACCOUNT_CODE IN ('Y-100-9007-90012','Y-103-1003-10215') AND pol_prd_code = 'MUH' AND pol_period_from >= '2023-07-01 00:00:00' AND pol_period_to <= '2023-07-01 00:00:00'
