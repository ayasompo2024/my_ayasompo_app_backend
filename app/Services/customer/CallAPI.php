<?php
namespace App\Services\customer;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Log;

trait CallAPI
{

    private function getCustomersListByPolicyAPICall($policy_nuber)
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
            dd("Error: {$statusCode} - {$errorMessage}");
        }
    }

}
// https://uatecom.ayasompo.com/Customer/GetPolicyCustomer?policyno=AYA/YGN/MCP/23000155
