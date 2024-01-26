<?php

namespace App\Listeners;

use App\Traits\WriteLogger;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CustomerRegistered;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\RequestException;


class RegisterCustomerToCircle
{
    use WriteLogger;
    public function __construct()
    {
    }

    public function handle(CustomerRegistered $event)
    {
        $this->sendPhoneNumberToTheCircleServer($event->data["request"]);
    }
    private function sendPhoneNumberToTheCircleServer($request)
    {
        $requestBody = ["phone" => $request->customer_phoneno];
        $this->writeLog("register", "Send Phone Number to Circle Server", $requestBody);
        $url = config('app.CIRCE_SERVER_BASE_URL') . 'api/register';
        $response = Http::withOptions(['verify' => false])->post($url, $requestBody);
        $data = $response->json();
        return response()->json($data);
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
