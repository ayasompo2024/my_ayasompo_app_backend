<?php
namespace App\Services\api\app\agent\response;


trait SaleDashboardResponse
{

    function saleDashboardResponse($row, $from_date, $to_date)
    {
        $collection = collect($row);
        return [
            'total' => [
                'from_date' => $from_date,
                "to_date" => $to_date,
                'total' => $collection->sum("premium")
            ],
            'product_premium' => $this->productPremium($collection),
            'type_of_business' => [
                'renewal' => '',
                'renewal_percent' => 15,
                'new_business' => '',
                'new_busines_spercent' => 50
            ]
        ];
    }

    private function productPremium($collection)
    {
        $premiumProductName = config('premium_product_name');
        return [
            [
                "product" => $premiumProductName[0],
                "percent" => '',
                'premium' => $this->getProductPremium($collection, strtoupper($premiumProductName[0]))
            ],
            [
                "product" => $premiumProductName[1],
                "percent" => '',
                'premium' => $this->getProductPremium($collection, strtoupper($premiumProductName[1]))
            ],
            [
                "product" => $premiumProductName[2],
                "percent" => '',
                'premium' => $this->getProductPremium($collection, strtoupper($premiumProductName[2]))
            ],
            [
                "product" => $premiumProductName[3],
                "percent" => '',
                'premium' => $this->getProductPremium($collection, strtoupper($premiumProductName[3]))
            ],
            [
                "product" => $premiumProductName[4],
                "percent" => '',
                'premium' => $this->getProductPremium($collection, strtoupper($premiumProductName[4]))
            ],
            [
                "product" => $premiumProductName[5],
                "percent" => '',
                'premium' => $this->getProductPremium($collection, strtoupper($premiumProductName[5]))
            ],
            [
                "product" => $premiumProductName[6],
                "percent" => '',
                'premium' => $this->getProductPremium($collection, strtoupper($premiumProductName[6]))
            ],
            [
                "product" => $premiumProductName[7],
                "percent" => '',
                'premium' => $this->getProductPremium($collection, strtoupper($premiumProductName[7]))
            ],
            [
                "product" => $premiumProductName[8],
                "percent" => '',
                'premium' => $this->getProductPremium($collection, strtoupper($premiumProductName[8]))
            ],
        ];
    }

    private function getProductPremium($collection, $target_product)
    {
        return $collection->filter(function ($item) use ($target_product) {
            return $item['product'] == $target_product;
        })->sum("premium");
    }

    private function calculatePercentage($totalPrice, $percentageNumber)
    {
        if (!is_numeric($percentageNumber) || !is_numeric($totalPrice)) {
            return "Invalid input. Please provide numeric values.";
        }
        $percentagePrice = ($percentageNumber * $totalPrice) / 100;
        return $percentagePrice;
    }
}

// "total": {
//     "from_date": null | string
//     "to_date": null | string
//     "total": integer | float
// },
