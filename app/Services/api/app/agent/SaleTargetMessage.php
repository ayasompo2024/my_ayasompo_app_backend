<?php

namespace App\Services\api\app\agent;

trait SaleTargetMessage
{
    private function messageLists()
    {
        return [
            // [
            //     "title" => "Halfway to 3 Mil target.",
            //     "message" => "mark towards your sales target. Keep up the great work!",
            //     "sale_amount" => 1500000,
            //     "is_reach" => false,
            //     "tier_in" => null,
            // ],
            [
                'title' => '2.5 Millions',
                'message' => '0.5 Mil away from 3 Mil target.',
                'sale_amount' => 2500000,
                'is_reach' => false,
                'tier_in' => null,
            ],
            [
                'title' => '3 Millions',
                'message' => "Congratulations! You've reached your 3 Mil target.",
                'sale_amount' => 3000000,
                'is_reach' => false,
                'tier_in' => 1,
            ],
            [
                'title' => '4.5 Millions',
                'message' => '0.5 Mil away from 5 Mil target.',
                'sale_amount' => 45000000,
                'is_reach' => false,
                'tier_in' => 1,
            ],
            [
                'title' => '5 Millions',
                'message' => "Congratulations! You've reached your 5 Mil target.",
                'sale_amount' => 5000000,
                'is_reach' => false,
                'tier_in' => 2,
            ],
            [
                'title' => '6.5 Millions',
                'message' => '0.5 Mil away from 7 Mil target.',
                'sale_amount' => 6500000,
                'is_reach' => false,
                'tier_in' => 2,
            ],
            [
                'title' => '7 Millions',
                'message' => "Congratulations! You've reached your 7 Mil target.",
                'sale_amount' => 7000000,
                'is_reach' => false,
                'tier_in' => 3,
            ],
            [
                'title' => '11.5 Millions',
                'message' => '0.5 Mil away from 12 Mil target.',
                'sale_amount' => 11500000,
                'is_reach' => false,
                'tier_in' => 3,
            ],
            [
                'title' => '12 Millions',
                'message' => "Congratulations! You've reached your 12 Mil target.",
                'sale_amount' => 12000000,
                'is_reach' => false,
                'tier_in' => 4,
            ],
        ];
    }

    public function getMessages($total_sale_amount)
    {
        return $this->messagDeterminator($this->messageLists(), $total_sale_amount);
    }

    private function messagDeterminator($messages, $total_sale_amount)
    {
        // if ($total_sale_amount >= 1500000) {
        //     $messages[0]["is_reach"] = true;
        // }
        if ($total_sale_amount >= 2500000) {
            $messages[0]['is_reach'] = true;
        }
        if ($total_sale_amount >= 3000000) {
            $messages[1]['is_reach'] = true;
        }
        if ($total_sale_amount >= 4500000) {
            $messages[2]['is_reach'] = true;
        }
        if ($total_sale_amount >= 5000000) {
            $messages[3]['is_reach'] = true;
        }
        if ($total_sale_amount >= 6500000) {
            $messages[4]['is_reach'] = true;
        }
        if ($total_sale_amount >= 7000000) {
            $messages[5]['is_reach'] = true;
        }
        if ($total_sale_amount >= 11500000) {
            $messages[6]['is_reach'] = true;
        }
        if ($total_sale_amount >= 12000000) {
            $messages[7]['is_reach'] = true;
        }

        return array_map(function ($item) {
            unset($item['sale_amount']);

            return $item;
        }, $messages);
    }
}
