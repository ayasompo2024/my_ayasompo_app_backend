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
            "user_name" => $this->user_name,
            "app_customer_type" => $this->app_customer_type,
            "profile_photo" => config('app.app_domain') . $this->profile_photo,
            'is_disabled' => $this->is_disabled,
            "customer_phoneno" => $this->customer_phoneno,


            "policy_number" => $this->policy_number,
            "risk_seqNo" => $this->risk_seqNo,
            "risk_name" => $this->risk_name,
            "customer_code" => $this->customer_code,

            "customer_nrc" => optional($this->core)->customer_nrc,
            'email' => optional($this->core)->email,
            'address' => optional($this->core)->address,
            'policy_holder_name' => optional($this->core)->customer_name,
            "original_phone" => optional($this->core)->customer_phoneno,

            "employee_info" => new EmployeeInfoRsource($this->employeeInfo),
            "agent_info" => null
        ];
    }
}