<?php

namespace App\Listeners;

use App\Events\CustomerRegistered;
use App\Repositories\CoreCustomerRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class storeCoreCustomer
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CustomerRegistered  $event
     * @return void
     */
    public function handle(CustomerRegistered $event)
    {
        $coreCustomer = $event->data["request"]->only("customer_code", "customer_type", "customer_name", "customer_phoneno", "customer_nrc");
        $coreCustomer["app_customer_id"] = $event->data["app_customer_id"];
        $customerFromCore = $this->getEmailAndAddressFromCoreSystem($event->data["request"]);
        $coreCustomer["email"] = $customerFromCore["data"][0]["emailAddress"];
        $coreCustomer["address"] = $customerFromCore["data"][0]["customerAddresses"][0]["adLocationDescription"];
        CoreCustomerRepository::store($coreCustomer);
        // $this->sendPhoneNumberToTheCircleServer($event->data["request"]);
    }
    private function getEmailAndAddressFromCoreSystem($request)
    {
        $end_point = config('app.ayasompo_base_url') . 'customer/filterCustomers';
        $token = Cache::get('token_for_internal');

        $requestBody = [
            "numOfRecordsPerPage" => "100",
            "pageNumber" => "1",
        ];
        if ($request->customer_type == "INDIVIDUAL" || $request->customer_type == "I" ) {
            $requestBody["nicNumber"] = $request->customer_nrc;
            $requestBody["corpRegNo"] = null;
        } else {
            $requestBody["corpRegNo"] = $request->customer_nrc;
            $requestBody["nicNumber"] = null;
        }
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
    private function sendPhoneNumberToTheCircleServer($request)
    {
        $end_point = config('app.CIRCE_SERVER_BASE_URL') . 'api/register';
        
        $requestBody = [
            "phone" => $request->customer_phoneno
        ];
        $headers = [
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
