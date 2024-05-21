<?php
namespace App\Http\Controllers\api\app\agent\response;
use App\Http\Resources\api\app\agent\LeaderBoardResource;

trait LeaderBoardResponse
{

    function leaderBoardRes($learders, $current_agent)
    {
        return [
            'campaign_title' => $learders[0]['campaign_title'],
            'current_points' => $this->getCurrentPoint($current_agent),
            'learder_agents' => LeaderBoardResource::collection($learders)
        ];
    }

    private function getCurrentPoint($current_agent)
    {
        return $current_agent->customer_phoneno;
    }
}