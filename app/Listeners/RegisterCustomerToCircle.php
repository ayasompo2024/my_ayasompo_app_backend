<?php

namespace App\Listeners;

use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\WriteLogger;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CustomerRegistered;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;


class RegisterCustomerToCircle
{
    use WriteLogger, RemoveInitialPlusNineFiveNine;
    public function __construct()
    {
    }

    public function handle(CustomerRegistered $event)
    {
        $res = $this->getPolicyDataByPhone($event->data["request"]['customer_phoneno']);
        \Log::info($res);
        if ($res['status'] == 200 && $res['data'][0]['circle_user']) {
            \Log::info('..circle_user True..');
            $responseStatusOfCircleRegister = $this->sendPhoneNumberToTheCircleServer($event->data["request"]);
            \Log::info($responseStatusOfCircleRegister);
        }
    }
    private function sendPhoneNumberToTheCircleServer($request)
    {
        $requestBody = ["name" => $request->user_name, "phone" => $this->removeInitialPlusNineFiveNine($request->customer_phoneno)];
        $this->writeLog("circle", "Request to Circle Server (INDIVIDUAL)", $requestBody);
        $url = config('app.CIRCE_SERVER_BASE_URL') . 'api/register';
        $response = Http::withOptions(['verify' => false])->post($url, $requestBody);
        $data = $response->json();
        $this->writeLog("circle", "Response from Circle Server (INDIVIDUAL)", $data);
        return $data;
    }

    private function getPolicyDataByPhone($phone)
    {
        $url = config("app.ayasompo_base_url") . "inquiry/policydata/" . base64_encode($phone);
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

    private function nothing($request)
    {
        $requestBody = [
            "phone" => $request->customer_phoneno
        ];
        // \Log::info($request->customer_phoneno);
        $headers = [
            'Accept' => 'application/json',
        ];
        $end_point = "";

        $client = new Client();

        // Create a promise for the asynchronous request
        $promise = $client->postAsync($end_point, ['headers' => $headers, 'json' => $requestBody]);

        // Wait for the promise to complete
        $promise->then(
            function ($response) {
                // Successfully completed request
                if ($response->getStatusCode() === 200) {
                    return $response->getBody()->getContents();
                } else {
                    // Handle other status codes if needed
                    return "Unexpected status code: " . $response->getStatusCode();
                }
            },
            function (RequestException $exception) {
                // Request failed
                return "Failed request: " . $exception->getMessage();
            }
        );

        // Ensure that the event loop is run to handle asynchronous requests
        $promise->wait();
    }
}
