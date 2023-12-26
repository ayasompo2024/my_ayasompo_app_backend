<?php

namespace App\Http\Resources\api\app;

use Illuminate\Http\Resources\Json\JsonResource;

class RegisterCustomerRsource extends JsonResource
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
            "user_name" => $this->user_name,
            "app_customer_type" => $this->app_customer_type,
            "profile_photo" => $this->profile_photo,
            "is_disabled" => 0,

            "risk_seqNo" => $this->risk_seqNo,
            "risk_name" => $this->risk_name,

            "customer_code" => $this->customer_code,
            "customer_phoneno" => $this->customer_phoneno,
            "customer_nrc" => $this->core->customer_nrc,
            "policy_number" => $this->policy_number,
            'email' => "implementing..",
            'address' => "implementing..",
            'policy_holder_name' => $this->core->customer_name,
        ];
    }
}
