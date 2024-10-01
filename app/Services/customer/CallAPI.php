<?php

namespace App\Services\customer;

use App\Traits\WriteLogger;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

trait CallAPI
{
    use WriteLogger;

    protected function getCustomersListByPolicyAPICall($policy_nuber)
    {
        $url = config('app.ayasompo_base_url').'Customer/GetPolicyCustomer?policyno='.$policy_nuber;
        $headers = [
            'Authorization' => 'Bearer '.Cache::get('token_for_internal'),
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

    public function callSMSAPI($to, $content)
    {
        $end_point = config('app.ayasompo_base_url').'sms/sendsms';
        $token = Cache::get('token_for_internal');
        $requestBody = [
            'phoneNumber' => $to,
            'message' => $content,
            'username' => 'Spidey Shine',
            'claimNo' => '',
        ];
        $headers = [
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
        ];
        $response = Http::withHeaders($headers)->post($end_point, $requestBody);
        if ($response->successful()) {
            return true;
            // return $response->json();
        } else {
            $statusCode = $response->status();
            $errorMessage = $response->body();
        }
    }

    //unuse
    public function callToCirlce($customer_phoneno)
    {
        $url = config('app.CIRCE_SERVER_BASE_URL').'api/register';
        $this->writeLog('circle_server', 'Request to Circle Server (EMPLOYEE)', ['phone' => $customer_phoneno]);
        $response = Http::withOptions(['verify' => false])->post($url, ['phone' => $customer_phoneno]);
        $data = $response->json();
        $this->writeLog('circle_server', 'Response from Circle Server (EMPLOYEE)', $data, false);

        return $data;
    }

    public function callToCirlceS($customer_phoneno, $name, $type)
    {
        $url = config('app.CIRCE_SERVER_BASE_URL').'api/register';
        $this->writeLog('circle_server', 'Request to Circle Server For '.$type, [
            'name' => $name,
            'phone' => $customer_phoneno,
        ]);
        $response = Http::withOptions(['verify' => false])->post(
            $url,
            [
                'name' => $name,
                'phone' => $customer_phoneno,
            ]
        );
        $data = $response->json();
        $this->writeLog('circle_server', 'Response from Circle Server (EMPLOYEE)', $data, false);

        return $data;
    }
}
