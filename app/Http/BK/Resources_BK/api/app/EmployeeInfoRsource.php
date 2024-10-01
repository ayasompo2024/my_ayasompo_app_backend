<?php

namespace App\Http\Resources\api\app;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeInfoRsource extends JsonResource
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
            'code' => $this->code,
            'designation' => $this->designation,
            'department' => $this->department,
            'email' => $this->email,
            'office_phone' => $this->office_phone,
            'office_address' => $this->office_address,
        ];
    }
}
