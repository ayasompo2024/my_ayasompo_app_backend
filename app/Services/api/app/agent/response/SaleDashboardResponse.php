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
        return [
            'total' => [
                'from_date' => $from_date,
                "to_date" => $to_date,
                'total' => $all_product_sale,
            ],
            // 'product_premium' => $this->productPremium($collection, $all_product_sale),
            'type_of_business' => [
                'renewal' => $renewals['amount'],
                'renewal_percent' => $renewals['percent'],
                'new_business' => $new_business['amount'],
                'new_busines_spercent' => $new_business['percent'],
            ],
            'detaillistcount' => 7,
            'productlist' => $this->chartData($from_date, $to_date),
            'raw_data' => $this->collection
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
    private function calculatePercentage($totalPrice, $sale_price)
    {
        $totalPrice = intval($totalPrice);
        $sale_price = intval($sale_price);
        if ($totalPrice === 0) {
            return 0;
        }
        return intval(($sale_price / $totalPrice) * 100);
    }
    private function chartData($from_date, $to_date)
    {
        $premiumProductName = config('premium_product_name');
        return [
            array_merge(
                [
                    'name' => $premiumProductName[0],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[0])),
                    'dataset' => $this->getDataSet($from_date, $to_date)
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[1],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[1])),
                    'dataset' => $this->getDataSet($from_date, $to_date)
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[2],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[2])),
                    'dataset' => $this->getDataSet($from_date, $to_date)
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[3],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[3])),
                    'dataset' => $this->getDataSet($from_date, $to_date)
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[4],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[4])),
                    'dataset' => $this->getDataSet($from_date, $to_date)
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[5],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[5])),
                    'dataset' => $this->getDataSet($from_date, $to_date)
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[6],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[6])),
                    'dataset' => $this->getDataSet($from_date, $to_date)
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[7],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[7])),
                    'dataset' => $this->getDataSet($from_date, $to_date)
                ]
            ),
            array_merge(
                [
                    'name' => $premiumProductName[8],
                    'total_amount' => $this->getProductPremium(strtoupper($premiumProductName[8])),
                    'dataset' => $this->getDataSet($from_date, $to_date)
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
    private function getDataSet($from_date, $to_date)
    {
        $from = Carbon::parse($from_date);
        $to = Carbon::parse($to_date);

        if ($from->isSameMonth($to))
            return $this->dataSetByDayOfMonth($from);

        if ($from->isSameYear($to))
            return $this->dataSetByMonthOfYear($from);

        return "return will all years datas";
    }

    private function dataSetByDayOfMonth($from)
    {
        return collect(range(1, $from->daysInMonth))->map(function ($day) use ($from) {
            return [
                'x_label' => $from->copy()->day($day)->toDateString(),
                'y_value' => $this->getProductPremiumByReceiptDate($from->copy()->day($day)->toDateString() . ' 00:00:00')
            ];
        });
    }

    private function dataSetByMonthOfYear($from_date)
    {
        $year = $from_date->year;
        $months = new Collection();
        for ($month = 1; $month <= 12; $month++) {
            $months->push(
                [
                    'x_label' => Carbon::create($year, $month, 1)->format('M'),
                    'y_value' => $this->getProductPremiumByReceiptMonth(Carbon::create($year, $month, 1)->format('Y-m'))
                ]
            );
        }
        return $months;
    }
    private function getProductPremiumByMonth($collection, $target_month)
    {
        return $collection->filter(function ($item) use ($target_month) {
            return Carbon::parse($item['receipt_date'])->format('Y-m') === $target_month;
        })->sum("premium");
    }

    private function getProductPremiumByReceiptDate($receipt_date)
    {
        $target_premium_product_sale = $this->collection->filter(function ($item) use ($receipt_date) {
            return $item['receipt_date'] == $receipt_date;
        })->sum("premium");
        return $target_premium_product_sale;
    }
    private function getProductPremiumByReceiptMonth($month)
    {
        $target_premium_product_sale = $this->collection->filter(function ($item) use ($month) {
            return Carbon::parse($item['receipt_date'])->format('Y-m') == $month;
        })->sum("premium");
        return $target_premium_product_sale;
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
