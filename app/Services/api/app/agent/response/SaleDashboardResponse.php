<?php
namespace App\Services\api\app\agent\response;


trait SaleDashboardResponse
{

    function saleDashboardResponse($row, $from_date, $to_date)
    {
        $collection = collect($row);
        $all_product_sale = $collection->sum("premium");
        $renewals = $this->typeOfBusiness($collection, 'Renewals', $all_product_sale);
        $new_business = $this->typeOfBusiness($collection, 'New Business', $all_product_sale);
        return [
            'total' => [
                'from_date' => $from_date,
                "to_date" => $to_date,
                'total' => $all_product_sale,
            ],
            'product_premium' => $this->productPremium($collection, $all_product_sale),
            'type_of_business' => [
                'renewal' => $renewals['amount'],
                'renewal_percent' => $renewals['percent'],
                'new_business' => $new_business['amount'],
                'new_busines_spercent' => $new_business['percent'],
            ]
        ];
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
    private function typeOfBusiness($collection, $target, $all_premium_product_sale)
    {
        $type_of_business_total_sale = $collection->filter(function ($item) use ($target) {
            return $item['pol_type'] == $target;
        })->sum("premium");
        return [
            'amount' => $type_of_business_total_sale,
            'percent' => $this->calculatePercentage($all_premium_product_sale, $type_of_business_total_sale)
        ];
    }
    private function calculatePercentage($totalPrice, $sale_price)
    {
        return intval((intval($sale_price) / intval($totalPrice)) * 100);
    }
}


// "total": {
//     "from_date": null | string
//     "to_date": null | string
//     "total": integer | float
// },
