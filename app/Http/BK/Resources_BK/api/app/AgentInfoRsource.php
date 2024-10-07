<?php

namespace App\Http\Resources\api\app;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentInfoRsource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'agent_name' => $this->agent_name,
            'license_no' => $this->license_no,
            'agent_type' => $this->agent_type,
            'expired_date' => $this->expired_date,
            'email' => $this->email,
            'achievement' => $this->achievement,
            'agent_codes' => '123,123,2323',
            'title' => $this->title,
        ];
    }
}
