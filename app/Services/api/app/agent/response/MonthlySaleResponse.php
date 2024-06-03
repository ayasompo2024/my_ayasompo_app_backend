<?php
namespace App\Services\api\app\agent\response;


trait MonthlySaleResponse
{
    function monthlySaleResponse($row, $req)
    {
        $collection = collect($row);

        if ($req->mock_total_sale_amount)
            $total_sale_amount = $req->mock_total_sale_amount;
        else
            $total_sale_amount = $collection->sum("all_product_gwp");

        $tier = $this->getTierForMonth($total_sale_amount);
        $tier_config = config('tiers');
        return [
            "from_date" => $req->from_date,
            "to_date" => $req->to_date ? $req->to_date : $req->from_date,
            "total_sale_amount" => number_format($total_sale_amount) . " MMK",

            "tier" => [
                "name" => $tier['tier_name'],
                "number" => $tier['tier_number'],
                "target_sale_amount" => $tier['tier_target_sale_amount'],
                "target_sale_amount_humna_format" => $tier['tier_target_sale_amount_humna_format'],
                "tier_reach_message" => $tier['tier_reach_message'],
            ],
            "is_unlocked_first_badge" => $total_sale_amount > $tier_config['first_badge_amount'] ? true : false,
            "messages" => $this->getMessages($total_sale_amount),
            "query_res" => $row,
        ];
    }

    private function getTierForMonth($totalSales)
    {
        $tiers = config('tiers');

        if ($totalSales >= $tiers['Platinum']) {
            return [
                "tier_name" => "Platinum (Tier IV)",
                "tier_number" => 4,
                "tier_target_sale_amount" => number_format(12000000),
                "tier_target_sale_amount_humna_format" => "12 Million",
                "tier_reach_message" => "Reaching your 12 Million target,"
            ];
        } elseif ($totalSales >= $tiers['Gold']) {
            return [
                "tier_name" => "Gold (Tier III)",
                "tier_number" => 3,
                "tier_target_sale_amount" => number_format(7000000),
                "tier_target_sale_amount_humna_format" => "7 Million",
                "tier_reach_message" => "Reaching your 7 Million target,"
            ];
        } elseif ($totalSales >= $tiers['Silver']) {
            return [
                "tier_name" => "Silver (Tier II)",
                "tier_number" => 2,
                "tier_target_sale_amount" => number_format(5000000),
                "tier_target_sale_amount_humna_format" => "5 Million",
                "tier_reach_message" => "Reaching your 5 Million target,"
            ];
        } elseif ($totalSales >= $tiers['Bronze']) {
            return [
                "tier_name" => "Bronze (Tier I) ",
                "tier_number" => 1,
                "tier_target_sale_amount" => number_format(3000000),
                "tier_target_sale_amount_humna_format" => "3 Million",
                "tier_reach_message" => "Reaching your 3 Million target,"
            ];
        } else {
            return [
                "tier_name" => "Not in Tiers",
                "tier_number" => 0,
                "tier_target_sale_amount" => "0",
                "tier_target_sale_amount_humna_format" => $this->geTotalSaleHumnaFormatForMonth(1000000),
                "tier_reach_message" => "Unlocked First Badge (3 Million)"
            ];
        }
    }

    private function geTotalSaleHumnaFormatForMonth($total_sale_amount)
    {
        if ($total_sale_amount < 1000000) {
            return strval($total_sale_amount);
        }
        return substr($total_sale_amount, 1, 1) . "Million";
    }

}