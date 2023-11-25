<?php
namespace App\Services;

use App\Repositories\CustomerRepository;

use App\Enums\MessagingType;
use App\Repositories\MessagingRepository;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class MessagingService
{

    function getCustomerById($id)
    {

    }

    function unicast($request)
    {
        $customer = CustomerRepository::getById($request->customer_id);
        $this->FCMUnicast($customer->device_token, $request->title, $request->message);
        $input = $request->only('title', 'message', 'type', 'customer_id');
        $input['type'] = MessagingType::UNICAST->value;
        return MessagingRepository::store($input);
    }

    private function FCMUnicast($device_token, $title, $message)
    {
        $url = config("app.fcm_url");
        try {
            $url = config('app.fcm_url');
            $serverKey = config('app.fcm_key');
            $data = [
                "title" => $title,
                "message" => $message
            ];
            return Http::withHeaders([
                'Authorization' => "key={$serverKey}",
                'Content-Type' => 'application/json'
            ])->post($url, [
                        'to' => $device_token,
                        "notification" => $data
                    ]);
        } catch (RequestException $e) {
            throw $e;
        }
    }
}



