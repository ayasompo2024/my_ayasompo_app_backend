<?php

namespace App\Http\Resources\api\app;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class LocationMapRsource extends JsonResource
{

    public function toArray($request)
    {
        $formattedOpenHour = Carbon::createFromFormat('H:i', $this->open_hour)->format('h:i A');
        $formattedCloseHour = Carbon::createFromFormat('H:i', $this->close_hour)->format('h:i A');
        return [
            'id' => $this->id,
            "distance" => $this->distance($this->latitude,$this->longitude) . " Mile",
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

    private function distance($shop_lat, $shop_long, $unit = null)
    {
        $currrent_customer = Session::get('currrent_customer');
        if (!isset($currrent_customer["latitude"]) && !isset($currrent_customer["longitude"])) {
            return null;
        } else {
            $user_lat = $currrent_customer["latitude"];
            $theta = $shop_long - $currrent_customer["longitude"];
            $dist = sin(deg2rad($shop_lat)) * sin(deg2rad($user_lat)) + cos(deg2rad($shop_lat)) * cos(deg2rad($user_lat)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return round(($miles * 1.609344), 1);
                // return ($miles * 1.609344) . "KM";
            } else if ($unit == "N") {
                return round(($miles * 0.8684), 1);
            } else {
                return round($miles, 1);
            }
        }
    }
}

