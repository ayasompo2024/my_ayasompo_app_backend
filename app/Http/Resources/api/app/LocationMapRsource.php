<?php

namespace App\Http\Resources\api\app;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class LocationMapRsource extends JsonResource
{

    public function toArray($request)
    {
        $formattedOpenHour = Carbon::createFromFormat('H:i', $this->open_hour)->format('h:i A');
        $formattedCloseHour = Carbon::createFromFormat('H:i', $this->close_hour)->format('h:i A');
        return [
            'id' => $this->id,
            "image" => config('app.app_domain') . $this->image,
            'name' => $this->name,
            'phone' => $this->phone,
            "open_days" => $formattedOpenHour,
            "open_hour" => $formattedCloseHour,
            "close_hour" => $this->close_hour,
            "address" => $this->address,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "google_map" => $this->google_map,
            "category_id" => $this->category->id,
            "category" => [
                "id" => $this->id,
                "name" => $this->category->name,
                "image" => config('app.app_domain') . $this->category->image,
                "sort" => $this->category->sort,
            ]
        ];
    }
}


