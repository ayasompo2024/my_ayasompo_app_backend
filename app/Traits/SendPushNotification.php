<?php

namespace App\Traits;

use GuzzleHttp\Client;
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
        $this->sendAsUnicastFroIOS($token, $notification, $data);
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
        if (SettingRepository::getByKey("IS_OPEN_NOTI")[0]["current_value"] == 1) {
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

    public function sendAsUnicastFroIOS($deviceToken, $notification, $data)
    {
        \Log::info($deviceToken);
        $keyId = 'B4CRAJNUT5';
        $teamId = 'BJA4J3WHA6';
        $bundleId = 'com.my.ayasompo';
        $privateKeyPath = __DIR__ . '/AuthKey_B4CRAJNUT5.p8';
        $now = time();
        $expiry = $now + 60 * 60;
        $header = ['alg' => 'ES256', 'kid' => $keyId];
        $payload = ['iss' => $teamId, 'iat' => $now, 'exp' => $expiry];

        $privateKey = file_get_contents($privateKeyPath);
        $jwt = $this->jwtEncode($header, $payload, $privateKey);

        $title = $notification["title"];
        $subtitle = null;
        $body = $notification["body"];

        $curlCommand = sprintf(
            'curl -v \
            --header "Authorization: Bearer %s" \
            --header "apns-topic: %s" \
            --header "apns-push-type: alert" \
            --header "apns-priority: 5" \
            --header "apns-expiration: 0" \
            --data \'{"aps":{"alert":{"title":"%s","subtitle":"%s","body":"%s"}}}\' \
            --http2 https://api.push.apple.com:443/3/device/%s',
            $jwt,
            $bundleId,
            addslashes($title),
            addslashes($subtitle),
            addslashes($body),
            $deviceToken
        );
        exec($curlCommand, $output, $statusCode);
        \Log::info($output);
        \Log::info($statusCode);
    }

    private function jwtEncode($header, $payload, $privateKey)
    {
        $encodedHeader = $this->base64urlEncode(json_encode($header));
        $encodedPayload = $this->base64urlEncode(json_encode($payload));

        $signature = '';
        openssl_sign("$encodedHeader.$encodedPayload", $signature, $privateKey, OPENSSL_ALGO_SHA256);
        $encodedSignature = $this->base64urlEncode($signature);

        return "$encodedHeader.$encodedPayload.$encodedSignature";
    }

    private function base64urlEncode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}
