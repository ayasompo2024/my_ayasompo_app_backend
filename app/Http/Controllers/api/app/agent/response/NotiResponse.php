<?php

namespace App\Http\Controllers\api\app\agent\response;

trait NotiResponse
{
    public function noitResponse($notis)
    {
        return [
            'sales_target' => $this->salseTargets($notis),
            'renewal' => $this->renewalRes($notis),
            'campaign_promotion' => $this->campaignPromotion($notis),
            'customer_birthday' => $this->customerBirthday($notis),
        ];
    }

    private function salseTargets($rows)
    {
        if (count($rows) < 1) {
            return [];
        } else {
            $collection = collect($rows);

            return $collection->filter(function ($item) {
                return $item['type'] == 'sales_target';
            })->values();
        }
    }

    private function renewalRes($rows)
    {
        if (count($rows) < 1) {
            return [];
        } else {
            $collection = collect($rows);

            return $collection->filter(function ($item) {
                return $item['type'] == 'renewal';
            })->values();
        }
    }

    private function campaignPromotion($rows)
    {
        if (count($rows) < 1) {
            return [];
        }
        $collection = collect($rows);

        return $collection->filter(function ($item) {
            return $item['type'] == 'campaign_promotion';
        })->values();
    }

    private function customerBirthday($rows)
    {
        if (count($rows) < 1) {
            return [];
        }
        $collection = collect($rows);

        return $collection->filter(function ($item) {
            return $item['type'] == 'customer_birthday';
        })->values();
    }
}
