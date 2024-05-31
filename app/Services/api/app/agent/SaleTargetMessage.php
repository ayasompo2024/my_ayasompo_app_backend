<?php

namespace App\Services\api\app\agent;


trait SaleTargetMessage
{
    private function messageLists()
    {
        return [
            [
                "message" => "You've hit the halfway mark towards your sales target. Keep up the great work!",
                "sale_amount" => 1500000,
                "is_reach" => false,
                "tier" => null,
            ],
            [
                "message" => "Just 0.5 Mil away from your 3 Mil target.Just a final effort and victory is within your grasp!",
                "sale_amount" => 2500000,
                "is_reach" => false,
                "tier" => null,
            ],
            [
                "message" => "You've surpassed your [3 Mil] target, demonstrating unparalleled dedication and skill. Celebrate your success, you've earned it!",
                "sale_amount" => 3000000,
                "is_reach" => true,
                "tier" => 1,
            ],
            [
                "message" => "Just 0.5 mil away from your 5 Mil target.With your prowess and drive, victory is within reach. Keep forging ahead!",
                "sale_amount" => 45000000,
                "is_reach" => false,
                "tier" => 1,
            ],
            [
                "message" => "Reaching your [5 Mil] target, showcasing your unwavering dedication and expertise. Revel in your success, you've reached new heights!",
                "sale_amount" => 5000000,
                "is_reach" => true,
                "tier" => 2,
            ],
            [
                "message" => "Just 0.5 million away from your 7 Mil target.A small push now will propel you to unparalleled success. Keep your sights set high!",
                "sale_amount" => 6500000,
                "is_reach" => false,
                "tier" => 2,
            ],
            [
                "message" => "Congratulations on achieving your 7 Mil target! Your dedication and hard work have paid off brilliantly. Here's to your continued success and exceeding even greater milestones!",
                "sale_amount" => 7000000,
                "is_reach" => false,
                "tier" => 3,
            ],
            [
                "message" => "Just 0.5 million away from your 12 Mil target.You're one step closer to achieving extraordinary results. Victory is on the horizon!",
                "sale_amount" => 15000000,
                "is_reach" => false,
                "tier" => 3,
            ],
            [
                "message" => "Mission accomplished! Congratulations on scaling the summit of success! By surpassing the 12 Mil target, you've unlocked exordinary milstones. Cheers to your remarkable victory!",
                "sale_amount" => 12000000,
                "is_reach" => false,
                "tier" => 4,
            ],
        ];
    }

    function getMessages($total_sale_amount)
    {
        return $this->messagDeterminator($this->messageLists(), $total_sale_amount);
    }

    private function messagDeterminator($messages, $total_sale_amount)
    {
        if ($total_sale_amount >= 1500000) {
            $messages[0]["is_reach"] = true;
        }
        if ($total_sale_amount >= 2500000) {
            $messages[1]["is_reach"] = true;
        }
        if ($total_sale_amount >= 3000000) {
            $messages[2]["is_reach"] = true;
        }
        if ($total_sale_amount >= 4500000) {
            $messages[3]["is_reach"] = true;
        }
        if ($total_sale_amount >= 5000000) {
            $messages[4]["is_reach"] = true;
        }
        if ($total_sale_amount >= 6500000) {
            $messages[5]["is_reach"] = true;
        }
        if ($total_sale_amount >= 7000000) {
            $messages[6]["is_reach"] = true;
        }
        if ($total_sale_amount >= 15000000) {
            $messages[7]["is_reach"] = true;
        }
        if ($total_sale_amount >= 12000000) {
            $messages[8]["is_reach"] = true;
        }
        return array_map(function ($item) {
            unset($item['sale_amount']);
            return $item;
        }, $messages);
    }

}
