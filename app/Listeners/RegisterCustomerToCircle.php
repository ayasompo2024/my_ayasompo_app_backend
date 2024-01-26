<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CustomerRegistered;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Exception\RequestException;


class RegisterCustomerToCircle
{    
    public function __construct()
    {
    }

    public function handle(CustomerRegistered $event)
    {
        $this->sendPhoneNumberToTheCircleServer($event->data["request"]);
    }
    private function sendPhoneNumberToTheCircleServer($request)
    {
        \Log::info("Sending Request to the circle server");
        return true;
        $end_point = config('app.CIRCE_SERVER_BASE_URL') . 'api/register';

        $requestBody = [
            "phone" => $request->customer_phoneno
        ];
        \Log::info($request->customer_phoneno);
        $headers = [
            'Accept' => 'application/json',
        ];

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
