<?php
namespace App\Services\api\app\agent\response;

use Carbon\Carbon;
use Illuminate\Support\Collection;

trait SaleDashboardResponse
{
    function saleDashboardResponse($from_date, $to_date)
    {
        $all_product_sale = $this->collection->sum("premium");
        $renewals = $this->typeOfBusiness('Renewals', $all_product_sale);
        $new_business = $this->typeOfBusiness('New Business', $all_product_sale);
        $additional = $this->typeOfBusiness("Additional", $all_product_sale);
        $refund = $this->typeOfBusiness("Refund", $all_product_sale);
        return [
            'total' => [
                'from_date' => $from_date,
                "to_date" => $to_date,
                'total' => $all_product_sale,
            ],
            'type_of_business' => [
                'renewal' => ($renewals['amount'] + $additional['amount']) - $refund["amount"],
                'renewal_percent' => ($renewals['percent'] + $additional['percent']) - $refund['percent'],
                'new_business' => $new_business['amount'],
                'new_busines_spercent' => $new_business['percent'],
                "obj_for_debugging" => [
                    'new_business' => $new_business,
                    'renewals' => $renewals,
                    'additional' => $additional,
                    'refund' => $refund
                ]
            ],
            'detaillistcount' => 7,
            'productlist' => $this->chartData($from_date, $to_date),
        ];
    }
    private function typeOfBusiness($target, $all_premium_product_sale)
    {
        $type_of_business_total_sale = $this->collection->filter(function ($item) use ($target) {
            return $item['pol_type'] == $target;
        })->sum("premium");
        return [
            'amount' => $type_of_business_total_sale,
            'percent' => $this->calculatePercentage($all_premium_product_sale, $type_of_business_total_sale)
        ];
    }
    private function chartData($from_date, $to_date)
    {
        $premiumProductName = config('premium_product_name');
        return [
            array_merge(
                [
                    'name' => $premiumProductName[0],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[0])),
                    'dataset' => $this->getDataSet($from_date, $to_date, strtoupper($premiumProductName[0]))
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[1],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[1])),
                    'dataset' => $this->getDataSet($from_date, $to_date, strtoupper($premiumProductName[1]))
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[2],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[2])),
                    'dataset' => $this->getDataSet($from_date, $to_date, strtoupper($premiumProductName[2]))
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[3],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[3])),
                    'dataset' => $this->getDataSet($from_date, $to_date, strtoupper($premiumProductName[3]))
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[4],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[4])),
                    'dataset' => $this->getDataSet($from_date, $to_date, strtoupper($premiumProductName[4]))
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[5],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[5])),
                    'dataset' => $this->getDataSet($from_date, $to_date, strtoupper($premiumProductName[5]))
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[6],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[6])),
                    'dataset' => $this->getDataSet($from_date, $to_date, strtoupper($premiumProductName[6]))
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[7],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[7])),
                    'dataset' => $this->getDataSet($from_date, $to_date, strtoupper($premiumProductName[7]))
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[8],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[8])),
                    'dataset' => $this->getDataSet($from_date, $to_date, strtoupper($premiumProductName[8]))
                ]
            ),
        ];
    }

    private function getProductPremium($target_product)
    {
        $target_premium_product_sale = $this->collection->filter(function ($item) use ($target_product) {
            return $item['product'] == $target_product;
        })->sum("premium");
        return $target_premium_product_sale;
    }
    private function getDataSet($from_date, $to_date, $target_product)
    {
        $from = Carbon::parse($from_date);
        $to = Carbon::parse($to_date);

        $dayCount = $from->diffInDays($to) + 1; // Including the end date

        // 01-07 day
        if ($dayCount <= 7) {
            return $this->dataSetByDay($from, $to, $target_product);
        }

        //5 week in one month
        if ($from->isSameMonth($to)) {
            $weeks = $this->dataSetByWeek($from, $target_product);
            foreach ($weeks as $weekData) {
                $weekData['x_label'] . ': ' . $weekData['y_value'] . "\n";
            }
            return $weeks;
        }

        //01-12 months
        if ($from->isSameYear($to))
            return $this->dataSetByMonthOfYear($from, $target_product);

        //2020 - 2024 select all years            
        return $this->dataSetByYear($from, $to, $target_product);
    }

    // 01-07 day
    private function dataSetByDay($from, $to, $target_product)
    {
        return collect(range(0, $from->diffInDays($to)))->map(function ($day) use ($from, $target_product) {
            $date = $from->copy()->addDays($day);
            $y_value = $this->getProductPremiumByReceiptDate($date->toDateString() . ' 00:00:00', $target_product);
            return [
                'x_label' => $date->format('d'),
                'y_value' => $y_value > 12000000 ? 12000000 : $y_value,
                "real_y_value" => $y_value,
                "chart_type" => "7 day count"
            ];
        });
    }

    //5 week in one month
    function dataSetByWeek($from, $target_product)
    {
        $daysInMonth = $from->daysInMonth;
        $weeks = [];
        $weekRanges = [
            [1, 7],
            [8, 13],
            [14, 20],
            [21, 27],
            [28, $daysInMonth]
        ];
        foreach ($weekRanges as $days) {
            $totalYValue = collect(range($days[0], $days[1]))->reduce(function ($carry, $day) use ($from, $target_product) {
                return $carry + $this->getProductPremiumByReceiptDate($from->copy()->day($day)->toDateString() . ' 00:00:00', $target_product);
            }, 0);

            $weeks[] = [
                'x_label' => $days[1],
                'y_value' => $totalYValue > 12000000 ? 12000000 : $totalYValue,
                'real_y_value' => $totalYValue,
                "chart_type" => "5 week in same  month"
            ];
        }
        return $weeks;
    }

    //01-12 months
    private function dataSetByMonthOfYear($from_date, $target_product)
    {
        $year = $from_date->year;
        $months = new Collection();
        for ($month = 1; $month <= 12; $month++) {
            $y_value = $this->getProductPremiumByReceiptMonth(Carbon::create($year, $month, 1)->format('Y-m'), $target_product);
            $months->push(
                [
                    'x_label' => Carbon::create($year, $month, 1)->format('m'),
                    'y_value' => $y_value > 12000000 ? 12000000 : $y_value,
                    "real_y_value" => $y_value,
                    "chart_type" => "01-12 months"
                ]
            );
        }
        return $months;
    }

    //2020 - 2024 select all years
    private function dataSetByYear($from, $to, $target_product)
    {
        $years = collect(range($from->year, $to->year))->map(function ($year) use ($target_product) {
            $startOfYear = Carbon::create($year, 1, 1);
            $endOfYear = Carbon::create($year, 12, 31);
            $totalYValue = collect(range(0, $startOfYear->diffInDays($endOfYear)))->reduce(function ($carry, $day) use ($startOfYear, $target_product) {
                $date = $startOfYear->copy()->addDays($day);
                return $carry + $this->getProductPremiumByReceiptDate($date->toDateString() . ' 00:00:00', $target_product);
            }, 0);

            return [
                'x_label' => $year,
                'y_value' => $totalYValue > 12000000 ? 12000000 : $totalYValue,
                "real_y_value" => $totalYValue,
                "chart_type" => "2020 - 2024 select all years"
            ];
        });

        return $years;
    }
    private function getProductPremiumByReceiptDate($receipt_date, $target_product)
    {
        $target_premium_product_sale = $this->collection->filter(function ($item) use ($receipt_date, $target_product) {
            return $item['receipt_date'] == $receipt_date && $item['product'] == $target_product;
        })->sum("premium");
        return $target_premium_product_sale;
    }
    private function getProductPremiumByReceiptMonth($month, $target_product)
    {
        $target_premium_product_sale = $this->collection->filter(function ($item) use ($month, $target_product) {
            return Carbon::parse($item['receipt_date'])->format('Y-m') == $month && $item['product'] == $target_product;
        })->sum("premium");
        return $target_premium_product_sale;
    }
    private function calculatePercentage($totalPrice, $sale_price)
    {
        $totalPrice = intval($totalPrice);
        $sale_price = intval($sale_price);
        if ($totalPrice === 0) {
            return 0;
        }
        return intval(($sale_price / $totalPrice) * 100);
    }
    private function getProductPremiumByMonth($collection, $target_month)
    {
        return $collection->filter(function ($item) use ($target_month) {
            return Carbon::parse($item['receipt_date'])->format('Y-m') === $target_month;
        })->sum("premium");
    }
    private function productPremium($collection, $all_product_sale)
    {
        $premiumProductName = config('premium_product_name');
        return [
            array_merge(['product' => $premiumProductName[0]], $this->getProductPremiumAndPercentage($collection, strtoupper($premiumProductName[0]), $all_product_sale)),
            array_merge(['product' => $premiumProductName[1]], $this->getProductPremiumAndPercentage($collection, strtoupper($premiumProductName[1]), $all_product_sale)),
            array_merge(['product' => $premiumProductName[1]], $this->getProductPremiumAndPercentage($collection, strtoupper($premiumProductName[2]), $all_product_sale)),
            array_merge(['product' => $premiumProductName[1]], $this->getProductPremiumAndPercentage($collection, strtoupper($premiumProductName[3]), $all_product_sale)),
            array_merge(['product' => $premiumProductName[1]], $this->getProductPremiumAndPercentage($collection, strtoupper($premiumProductName[4]), $all_product_sale)),
            array_merge(['product' => $premiumProductName[1]], $this->getProductPremiumAndPercentage($collection, strtoupper($premiumProductName[5]), $all_product_sale)),
            array_merge(['product' => $premiumProductName[1]], $this->getProductPremiumAndPercentage($collection, strtoupper($premiumProductName[6]), $all_product_sale)),
            array_merge(['product' => $premiumProductName[1]], $this->getProductPremiumAndPercentage($collection, strtoupper($premiumProductName[7]), $all_product_sale)),
            array_merge(['product' => $premiumProductName[1]], $this->getProductPremiumAndPercentage($collection, strtoupper($premiumProductName[8]), $all_product_sale)),
        ];
    }
    private function getProductPremiumAndPercentage($collection, $target_product, $all_premium_product_sale)
    {
        $target_premium_product_sale = $collection->filter(function ($item) use ($target_product) {
            return $item['product'] == $target_product;
        })->sum("premium");
        return [
            'premium' => $target_premium_product_sale,
            'percent' => $this->calculatePercentage($all_premium_product_sale, $target_premium_product_sale)
        ];
    }
}
