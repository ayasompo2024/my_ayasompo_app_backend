<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;



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
                    "notification" => $notification,
                    "data" => $data
                ]
            );

    }
    protected function sendAsbroadcast($notification, $data)
    {

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
