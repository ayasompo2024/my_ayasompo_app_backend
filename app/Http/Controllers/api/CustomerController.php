<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Traits\CURL;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CustomerController extends Controller
{

    use Auth;
    public function profile(Request $request)
    {
        $user = $request->user();
        return response()->json(['user' => $user]);
    }

    public function getCustomersByPolicyNumber(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'policy_number' => 'required|string|min:10|max:255',
        ]);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $token = Str::substr($request->header('Authorization'), 7);

        return $this->callAPIForGetCustomersByPolicyNumber($token, $request->policy_number);

    }
    private function callAPIForGetCustomersByPolicyNumber($accessToken, $policy_number)
    {
        $client = new Client();
        $end_point = "https://uatecom.ayasompo.com/Customer/GetPolicyCustomer";

        try {
            $body = [
                'policyno' => $policy_number
            ];
            $jsonBody = json_encode($body);

            $response = $client->request('GET', $end_point, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                RequestOptions::BODY => $jsonBody,
            ]);
            $data = $response->getBody()->getContents();
            $parsedData = json_decode($data);
            return response()->json($parsedData);
        } catch (RequestException $e) {
            return response()->json(['error' => 'API request failed'], 500);
        }
    }
}