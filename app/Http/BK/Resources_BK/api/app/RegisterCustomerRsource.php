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
            "customer_phoneno" => $this->customer_phoneno,
            "profile_photo" => config('app.app_domain') . $this->profile_photo,
            "is_disabled" => 0,


            "risk_seqNo" => $this->risk_seqNo,
            "risk_name" => $this->risk_name,
            "customer_code" => $this->customer_code,
            "policy_number" => $this->policy_number,

            "customer_nrc" => $this->core->customer_nrc,
            'email' => $this->core->email,
            'address' => $this->core->address,
            'policy_holder_name' => $this->core->customer_name,
            "original_phone" => $this->core->customer_phoneno,

            "employee_info" => null,
            "agent_info" => null,
        ];
    }
}
