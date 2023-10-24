<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Log;


trait SendPushNotification
{
    function sendFcmPushNotification($customer_id, $title, $message)
    {
        // Log::info('sendFcmPushNotification: ' . $title . $message);
        // $url = config('app.fcm_url');
        // $serverKey = config('app.fcm_key');
        // $data = [
        //     "title" => $title,
        //     "message" => $message
        // ];
        // return Http::withHeaders([
        //     'Authorization' => "key={$serverKey}",
        //     'Content-Type' => 'application/json'
        // ])->post($url, [
        //             'to' => "fQjQD8J-T7mMubjnOGS-iD:APA91bETeHlHmqv4s1SgKhahVlTc5xrAzCTtaT2HEcCT8cV6MH1QYb_f6Iv71f5lfsnY4g5mjczQ_qXDaQ9WDC0ur89irUj9LrFUXLByrsl1K7Q19Hp20c9m9VC13Hy08bPd_uNrsMTc",
        //             "data" => $data
        //         ]);
    }
    function sendFcmPushNotification2($customer_id, $title, $message)
    {
        $url = config('app.fcm_url');
        $serverKey = config('app.fcm_key');
        $data = [
            'to' => "token",
            "message" => [
                "title" => "title",
                "body" => "Body",
            ]
        ];
        $encodedData = json_encode($data);
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        $result = curl_exec($ch);
        // if ($result === FALSE) {
        //     die('Curl failed: ' . curl_error($ch));
        // }
        curl_close($ch);
    }

}