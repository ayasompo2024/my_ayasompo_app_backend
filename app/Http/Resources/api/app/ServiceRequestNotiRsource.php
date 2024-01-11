<?php

namespace App\Http\Resources\api\app;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Enums\NotiFor;

class ServiceRequestNotiRsource extends JsonResource
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
            'noti_for' => NotiFor::TRANSACTION->value,
            'title' => $this->title,
            'message' => $this->title,
            'customer_id' => $this->customer_id,
            'description' => null,
            'image_url' => null,
            'created_at' => $this->created_at->diffForHumans(),
            'caseid' => $this->ayasompo_caseid,
            "ayasompo_risksequenceno" => $this->ayasompo_risksequenceno,
            "ayasompo_policyno" => $this->ayasompo_policyno,
            "ayasompo_casenumber" => $this->ayasompo_casenumber,
            "incidentid" => $this->incidentid,
            "inquiry_type" => $this->inquiry_type
        ];
    }
}








