<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use App\Repositories\SettingRepository;
trait SendPushNotification
{

    protected function sendAsUnicast($token, $notification, $data)
    {
        $url = config('app.fcm_url');
        $serverKey = config('app.fcm_key');
        Http::withHeaders([
            'Authorization' => "key={$serverKey}",
            'Content-Type' => 'application/json'
        ])->post(
                $url,
                [
                    "to" => $token,
                    "priority" => "high",
                    "notification" => $notification,
                    "data" => $data
                ]
            );
    }
    protected function sendAsUnicastDataOnly($token, $data)
    {
        $url = config('app.fcm_url');
        $serverKey = config('app.fcm_key');
        Http::withHeaders([
            'Authorization' => "key={$serverKey}",
            'Content-Type' => 'application/json'
        ])->post(
                $url,
                [
                    "to" => $token,
                    "priority" => "high",
                    "data" => $data
                ]
            );
    }
    protected function sendAsbroadcast($notification, $data)
    {
        if(SettingRepository::getByKey("IS_OPEN_NOTI")[0]["current_value"] == 1){
            $url = config('app.fcm_url');
            $serverKey = config('app.fcm_key');
            Http::withHeaders([
                'Authorization' => "key={$serverKey}",
                'Content-Type' => 'application/json'
            ])->post(
                    $url,
                    [
                        "condition" => "'all_users' in topics",
                        "priority" => "high",
                        "notification" => $notification,
                        "data" => $data
                    ]
                );
        }
    }
}
