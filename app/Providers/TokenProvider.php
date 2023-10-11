<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TokenProvider extends ServiceProvider
{
    public function boot()
    {
        try {
            if (!Cache::has('token')) {
                // if (false) {
                $auth_route = config('app.auth_route');
                $user_name = config('app.user_name');
                $password = config('app.password');
                $response = Http::post($auth_route, ['username' => $user_name, 'password' => $password]);
                if ($response->successful()) {
                    $responseContentJson = json_decode($response->body());
                    // $responseData = $response->json();
                    // dd($responseContentJson);
                    $cacheExpireIn = $responseContentJson->expire_in - 300; // cacheExpireIn in 25 Minute
                    Cache::put('token', $responseContentJson, $cacheExpireIn);
                } else {
                    $statusCode = $response->status();
                    $errorResponse = $response->body();
                }
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            throw $e;
        }
    }

    public function register()
    {
    }
}