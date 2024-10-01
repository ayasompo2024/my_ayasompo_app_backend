<?php

namespace App\Providers;

use Google_Client;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Log;

class TokenProvider extends ServiceProvider
{
    public function boot()
    {
        $this->getInternalToken();
        $this->GetCRMAPIToken();
    }

    private function GetCRMAPIToken()
    {
        $tenantID = config('app.tenant_id');
        try {
            // if (false) {
            if (! Cache::has('CRM_API_Token')) {
                $tokenURL = "https://login.microsoftonline.com/$tenantID/oauth2/token";
                $client = new Client;
                $response = $client->post($tokenURL, [
                    'form_params' => [
                        'grant_type' => 'client_credentials',
                        'client_id' => config('app.client_id'),
                        'client_secret' => config('app.client_secret'),
                        'resource' => config('app.resource_url'),
                    ],
                ]);
                $tokenData = json_decode($response->getBody(), true);
                $cacheExpireIn = intval($tokenData['expires_in']) - 300;
                Cache::put('CRM_API_Token', $tokenData['access_token'], $cacheExpireIn);
            }
        } catch (RequestException $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    private function getInternalToken()
    {
        try {
            // if (false) {
            if (! Cache::has('token_for_internal')) {
                $auth_route = config('app.auth_route');
                $user_name = config('app.user_name');
                $password = config('app.password');
                $response = Http::post($auth_route, ['username' => $user_name, 'password' => $password]);
                if ($response->successful()) {
                    $responseContentJson = json_decode($response->body());
                    $cacheExpireIn = $responseContentJson->expire_in - 300;
                    Cache::put('token_for_internal', $responseContentJson->access_token, $cacheExpireIn);
                } else {
                    $statusCode = $response->status();
                    $errorResponse = $response->body();
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    // private function getGoogleToken()
    // {
    //     $credentials = json_encode([
    //         "type" => "service_account",
    //         "project_id" => "hipo-mobile",
    //         "private_key_id" => "914ae46bf4e67a9d975e8e5f14de80e7a2795066",
    //         "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDJOdN28BlqgPuG\nke5p1IxwtDLRFCPc9XYEt52I/nvR8n1eDvAxPx0BfXWCNzTwmButKX1fVVCbnWHx\nZw8algdrcQHJyo1DyJTxEmO7fE1e6l/4VtTIncB5wihQj/kBJT8OL7lXU1iRfBIR\nPxw+S/t1PrKrph5tA/bxnXzQlGYQ5fHU3ouyqL+2YRfXJAMmrLuUe6OHas1h8Zy5\nSkTQAQeqz3sobuv/EfDhPwCQg7aa8CH6biztw5NEBlN4qX4r+ttT+QjEg1CrcJ4h\nlSqzPKMOWbxgpCpTg/dTG230bjRQeaHmhj7RtcyISWRXOH561cFAyyhlCMs/sdun\nZz+VAOFTAgMBAAECggEAGOfa2AREqQ141EGYqCmiDksHZSBghfctmczeJzgUPDqO\nsMcZjIbawLX2Bt1tZH/3IPobJeMJ3JDgr//I+0npdi9hAMhcrrCTWrkjde+fJenN\nYg/hO0lnKsrQsZP4Rl+FS+y1PG0475zTIaZViRJfd7YAaEVhy61rcaFD8w8DCQEs\nubEj68hhivtyABsN6vNdtYpDwuRcBB6ah0tBYoPYuuKniHkTZHJn+cL/cmM1fXZo\ng+KSGjERIVU7uL3/od6hfj1lJ26JBDfEyvVL+z/NHTHCjf9YUQRiLNYmU2Pajjeu\nk8HxjGDB8K6JXPTgk6ZGqBjGhD1IzCNMGDkOEQfMGQKBgQDm21zQsgNQxs08RRRi\nAEQjDo/LtbxmeLbMDZzKsTnMNBkElgjStqOPPbnZIzxnPquYHLkHg979Vbs6L0pm\nIdFHNIejgT3tlKeVRvXeCnPxIldrkm00mxgRnPC2ZE964vzRZKrGfeOI+611u+ZL\nhvdMddQ/IgyIQ0Nv5k9O5PWdCQKBgQDfJE55J50LOdbEBmvpG2KYJboQLjY1SI2n\n4eOUy7hwSb5C1z5qiKWJATUMPc6kyczlEMjzVdC5ZE0NxJdOdBn5+LDNny8XamUV\nVDBmKI/gFChSbDlA+tlnp0qyt5yim4Kw7umliv6ckQc8LoaWegUbk4wLhQwKYqrZ\n6g3I0xR+ewKBgD3sO0IzbZY+LRDsiqIa5ivtHP8MWWO3H3kucY8g6JrwooFLaURz\n/v1OFkq7G9mpwsdDdRIh+i9Dzru1saQhkAwkd/mQkjbm9+ifpxWPAjh8+Kv/E9HX\nhCY9TYfu8i7JMf1Mnk4tuFmnAIkjBIvfwPe+Z1cj3+6w9CbQxRcpbQRZAoGBALa6\n4JhOXEhpIPp917iY+HBn1KqTbUjNFVO5o8ih23P4r5nE8hQDuqsrFenkY2iG6Qdc\na3L5f2eSP5dauh1A7lTJ1t9L0CB4vDZvLwM5jDiPyUVV4rzXr1k2ofEgc2ClwKxr\nuWIbJM3J5gbegtCPM8eVWEXGukl26zpwdMFUOaApAoGAXYf0mqgNwVKE3XHVSMje\nHIjBuix9/lSKUIR4C7lDm7Dhh2Zcaq1Mgw5gtOSAquVPBKbRYW81OQZ0h9OaYWUV\nI8cbecko8grqV6aRVm5yyJC5+3ml8oRicKXag48RGjquP+UIUcU37Qj2Cs2qD8/4\nZC04i5R/ZeNx4GVhS8pipl8=\n-----END PRIVATE KEY-----\n",
    //         "client_email" => "drivinglicense@hipo-mobile.iam.gserviceaccount.com",
    //         "client_id" => "114747028403866335067",
    //         "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
    //         "token_uri" => "https://oauth2.googleapis.com/token",
    //         "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
    //         "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/drivinglicense%40hipo-mobile.iam.gserviceaccount.com",
    //         "universe_domain" => "googleapis.com"
    //     ]);

    //     $client = new Google_Client();
    //     $client->setAuthConfig(json_decode($credentials, true));

    //     $client->addScope('https://www.googleapis.com/auth/auth/userinfo.email');
    //     // Check if the client requires scopes and create them if necessary
    //     // if ($client->createScopedRequired()) {
    //     //     $client->addScope('https://www.googleapis.com/auth/example_scope');
    //     // }

    //     // Fetch the access token
    //     $token = $client->fetchAccessTokenWithAssertion();

    //     Log::info($token);
    // }
}
