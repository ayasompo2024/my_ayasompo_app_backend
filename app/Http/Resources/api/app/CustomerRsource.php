<?php

namespace App\Http\Resources\api\app;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerRsource extends JsonResource
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
            "customer_code" => $this->customer_code,
            "customer_phoneno" => $this->customer_phoneno,
            "user_name" => $this->user_name,
            "app_customer_type" => $this->app_customer_type,
            "profile_photo" => config('app.app_domain') . $this->profile_photo,
            "policy_number" => $this->policy_number,
            "risk_seqNo" => $this->risk_seqNo,
            "risk_name" => $this->risk_name,
            'is_disabled' => $this->is_disabled
        ];
    }
}