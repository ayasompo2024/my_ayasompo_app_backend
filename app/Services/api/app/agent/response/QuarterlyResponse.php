<?php

namespace App\Services\api\app\agent\response;

trait QuarterlyResponse
{
    public function quarterlyResponse($row, $year)
    {
        return [
            $this->proto($row, $year, '12', 'Dec'),
            $this->proto($row, $year, '11', 'Nov'),
            $this->proto($row, $year, '10', 'Oct'),
            $this->proto($row, $year, '09', 'Sep'),
            $this->proto($row, $year, '08', 'Aug'),
            $this->proto($row, $year, '07', 'Jul'),
            $this->proto($row, $year, '06', 'Jun'),
            $this->proto($row, $year, '05', 'May'),
            $this->proto($row, $year, '04', 'Apr'),
            $this->proto($row, $year, '03', 'Mar'),
            $this->proto($row, $year, '02', 'Feb'),
            $this->proto($row, $year, '01', 'Jan'),
        ];
    }

    private function proto($row, $year, $month_number, $month_name)
    {
        $currentYear = date('Y');
        if ($year == null) {
            $year = $currentYear;
        }

        $tiers_config = config('tiers');
        $total_sale = $this->getTotalSale($row, $month_number.'-'.$year);
        $tier = $this->getTierForYear($total_sale, $year, $month_name);

        return [
            'month_name' => $month_name,
            'month_number' => $month_number,
            'is_unlocked_first_badge' => $total_sale > $tiers_config['first_badge_amount'] ? true : false,
            'total_sale' => $total_sale,
            'tier' => [
                'name' => $tier['tier_name'],
                'number' => $tier['tier_number'],
                'target_sale_amount' => $tier['tier_target_sale_amount'],
                'target_sale_amount_humna_format' => $tier['tier_target_sale_amount_humna_format'],
                'tier_reach_message' => $tier['tier_reach_message'],
            ],
        ];
    }

    private function getTotalSale($row, $target_month)
    {
        $collection = collect($row);

        return $collection->filter(function ($item) use ($target_month) {
            return $item['receipt_date'] == $target_month;
        })->sum('all_product_gwp');
    }

    private function getTierForYear($totalSales, $year, $month_name)
    {
        $tiers = config('tiers');

        if ($totalSales >= $tiers['Platinum']) {
            return [
                'tier_name' => 'Platinum (Tier IV)',
                'tier_number' => 4,
                'tier_target_sale_amount' => number_format(12000000),
                'tier_target_sale_amount_humna_format' => '12 Million',
                'tier_reach_message' => " You've earned Platinum Badge for ".$month_name.','.$year.' with GWP MMK '.number_format($totalSales).'.',
            ];
        } elseif ($totalSales >= $tiers['Gold']) {
            return [
                'tier_name' => 'Gold (Tier III)',
                'tier_number' => 3,
                'tier_target_sale_amount' => number_format(7000000),
                'tier_target_sale_amount_humna_format' => '7 Million',
                'tier_reach_message' => " You've earned Gold Badge for ".$month_name.','.$year.' with GWP MMK '.number_format($totalSales).'.',
            ];
        } elseif ($totalSales >= $tiers['Silver']) {
            return [
                'tier_name' => 'Silver (Tier II)',
                'tier_number' => 2,
                'tier_target_sale_amount' => number_format(5000000),
                'tier_target_sale_amount_humna_format' => '5 Million',
                'tier_reach_message' => " You've earned Silver Badge for ".$month_name.','.$year.' with GWP MMK '.number_format($totalSales).'.',
            ];
        } elseif ($totalSales >= $tiers['Bronze']) {
            return [
                'tier_name' => 'Bronze (Tier I) ',
                'tier_number' => 1,
                'tier_target_sale_amount' => number_format(3000000),
                'tier_target_sale_amount_humna_format' => '3 Million',
                'tier_reach_message' => " You've earned Bronze Badge for ".$month_name.','.$year.' with GWP MMK '.number_format($totalSales).'.',
            ];
        } else {
            return [
                'tier_name' => 'Not in Tiers',
                'tier_number' => 0,
                'tier_target_sale_amount' => '0',
                'tier_target_sale_amount_humna_format' => $this->geTotalSaleHumnaFormatForQuarter(1000000),
                'tier_reach_message' => 'Unlocked first badge for '.$month_name.','.$year.'('.number_format($totalSales).').',
            ];
        }
    }

    private function geTotalSaleHumnaFormatForQuarter($total_sale_amount)
    {
        if ($total_sale_amount < 1000000) {
            return strval($total_sale_amount);
        }

        return substr($total_sale_amount, 1, 1).'Million';
    }
}

// You've earned [Bronze] Badge for [April], [2024] with GWP MMK [3,200,000].
