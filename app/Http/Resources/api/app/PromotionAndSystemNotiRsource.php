<?php

namespace App\Http\Resources\api\app;

use Illuminate\Http\Resources\Json\JsonResource;

class PromotionAndSystemNotiRsource extends JsonResource
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
            'noti_for' => $this->noti_for,
            'title' => $this->title,
            'message' => $this->message,
            'customer_id' => $this->customer_id,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}








