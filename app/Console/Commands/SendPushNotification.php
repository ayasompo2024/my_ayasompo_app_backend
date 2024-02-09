<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendPushNotification extends Command
{
    protected $signature = 'push:send';

    protected $description = 'Send push notification using Apple Push Notification Service (APNs)';

    public function handle()
    {

        $keyId = 'B4CRAJNUT5';
        $teamId = 'BJA4J3WHA6';
        $bundleId = 'com.my.ayasompo';
        $privateKeyPath = __DIR__ . '/AuthKey_B4CRAJNUT5.p8';
        
        $now = time();
        $expiry = $now + 60 * 60; 

        $header = ['alg' => 'ES256','kid' => $keyId];

        $payload = [
            'iss' => $teamId,
            'iat' => $now,
            'exp' => $expiry,
        ];

        $privateKey = file_get_contents($privateKeyPath);
        $jwt = $this->jwtEncode($header, $payload, $privateKey);

        // Replace with the actual device token
        // $deviceToken = '36691896C559283835231BD8A8F7837AB28460890DCEFDE521A0BE5230088F87';

        // cURL command
        $curlCommand = sprintf(
            'curl -v \
            --header "Authorization: Bearer %s" \
            --header "apns-topic: %s" \
            --header "apns-push-type: alert" \
            --header "apns-priority: 5" \
            --header "apns-expiration: 0" \
            --data \'{"aps":{"alert":{"title":"title","subtitle":"subtitle","body":"body"}}}\' \
            --http2 https://api.push.apple.com:443/3/device/F8C4206F8B34A232B8CC58DA3D4A3B7B092593DC8AD0B1AA2BE93527DF150B06',
            $jwt,
            $bundleId,
            // $deviceToken
        );

        $this->info("Executing cURL command:\n\n$curlCommand\n");

        // Execute the cURL command
        exec($curlCommand, $output, $statusCode);

        // Display the result
        $this->info("cURL Output:\n" . implode("\n", $output));
        $this->info("Status Code: $statusCode");
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
