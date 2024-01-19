<?php
namespace App\Services\customer;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Log;

trait CallAPI
{

    protected function getCustomersListByPolicyAPICall($policy_nuber)
    {
        $url = config("app.ayasompo_base_url") . "Customer/GetPolicyCustomer?policyno=" . $policy_nuber;
        $headers = [
            'Authorization' => 'Bearer ' . Cache::get('token_for_internal'),
            'Accept' => 'application/json',
        ];
        $response = Http::withHeaders($headers)->get($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            $statusCode = $response->status();
            $errorMessage = $response->body();
        }
    }
    protected function callSMSAPI($to, $content)
    {
        $end_point = config('app.ayasompo_base_url') . 'sms/sendsms';
        $token = Cache::get('token_for_internal');
        $requestBody = [
            'phoneNumber' => $to,
            'message' => $content,
            "username" => "Spidey Shine",
            "claimNo" => ""
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

}

