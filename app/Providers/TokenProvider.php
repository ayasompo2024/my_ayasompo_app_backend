<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Repositories\ProductCodeListRequestFormTypeRepo;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use League\OAuth1\Client\Credentials\TokenCredentials;
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
        $tenantID = config("app.tenant_id");
        try {
            // if (false) {
            if (Cache::has('CRM_API_Token')) {
                $tokenURL = "https://login.microsoftonline.com/$tenantID/oauth2/token";
                $client = new Client();
                $response = $client->post($tokenURL, [
                    'form_params' => [
                        'grant_type' => 'client_credentials',
                        'client_id' => config("app.client_id"),
                        'client_secret' => config("app.client_secret"),
                        'resource' => config("app.resource_url"),
                    ],
                ]);
                $tokenData = json_decode($response->getBody(), true);
                $cacheExpireIn = intval($tokenData["expires_in"]) - 300;
                Cache::put('CRM_API_Token', $tokenData["access_token"], $cacheExpireIn);
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
            if (!Cache::has('token_for_internal')) {
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
}
