<?php

namespace App\Http\Resources\api\app\agent;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResponse extends JsonResource
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
            "title" => $this->title,
            "file" => $this->file,
            "description" => $this->description,
        ];
    }
}











