<?php

namespace App\Http\Resources\api\app\agent;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaderBoardResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'points' => $this->points,
            'phone' => $this->points,
            'profile_photo' => $this->profile ? $this->profile->profile_photo : '/uploads/profile/user.jpg',
        ];
    }
}
