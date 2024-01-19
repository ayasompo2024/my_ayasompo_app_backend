<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

trait SendSms
{
    public function callSMSAPI($to, $content, $username = "Spidey Shine", $claimNo = "")
    {
        $end_point = config('app.ayasompo_base_url') . 'sms/sendsms';
        $token = Cache::get('token_for_internal');
        $requestBody = [
            'phoneNumber' => $to,
            'message' => $content,
            "username" => $username,
            "claimNo" => $claimNo
        ];
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];
        $response = Http::withHeaders($headers)->post($end_point, $requestBody);
        if ($response->successful()) {
            return $response->json();
        } else {
            $statusCode = $response->status();
            $errorMessage = $response->body();
        }

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