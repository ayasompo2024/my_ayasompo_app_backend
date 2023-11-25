<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use App\Repositories\SettingRepository;


trait SendSms
{
    public function sendSmsMessage($to, $content)
    {
        $end_point = config('app.ayasompo_base_url') . 'sms/sendsms';
        $token = Cache::get('token_for_internal');
        \Log::info($to);
        \Log::info($content);
        $body = ["to" => $to, "message" => $content];
        $header = [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $token
        ];

        $curl = curl_init();
        curl_setopt_array(
            $curl,
            [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",

                CURLOPT_URL => $end_point,
                CURLOPT_HTTPHEADER => $header,
                CURLOPT_POSTFIELDS => json_encode($body),
            ]
        );

        $response = curl_exec($curl);
        $response = json_decode($response);
        if ($response->status)
            return $response;
        else
            return false;
    }
    function generateOTPCode()
    {
        return substr(random_int(1234, 9999), 0, 4);
    }
    function getOTPContent($code)
    {
        return 'Your OTP for DOMAIN is ' . $code . '. It is valid for next 15 minutes. Please do not share it to anyone. Thanks for using Gegomm!';
    }
    function removeInitialZero($phone)
    {
        if ($phone[0] == '0') {
            return '+95' . substr($phone, 1);
        }
        return '+95' . $phone;
    }
}