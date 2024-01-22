<?php
namespace App\Services\api\app\claimcase;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Log;

trait CallAPI
{
    private function CallMotorCaseAPI($data)
    {
        $url = config("app.CREATE_CLAIM_CASE_BASE_URL") . "api/external/claimprocess/claimcase/motor";
        try {
            $response = Http::post($url, $data);
            $this->writeInquiryLog("CallMotorCaseAPI (Upstream Server Respone)",json_decode($response->getBody(), true));
            if ($response->successful()) {
                $responseContentJson = json_decode($response->body());
                return $responseContentJson;
            } else {
                $statusCode = $response->status();
                $errorResponse = $response->body();
            }
        } catch (RequestException $e) {
            $this->writeInquiryLog("CallMotorCaseAPI (Upstream Server Respone)",$e);
            throw $e;
        }
    }
    private function CallNonMotorCaseAPI($data)
    {
        $url = config("app.CREATE_CLAIM_CASE_BASE_URL") . "api/external/claimprocess/claimcase/non-motor";
        try {
            $response = Http::post($url, $data);
            $this->writeInquiryLog("CallMotorCaseAPI (Upstream Server Respone)",json_decode($response->getBody(), true));
            if ($response->successful()) {
                $responseContentJson = json_decode($response->body());
                return $responseContentJson;
            } else {
                $statusCode = $response->status();
                $errorResponse = $response->body();
            }
        } catch (RequestException $e) {
            $this->writeInquiryLog("CallNonMotorCaseAPI (Upstream Server Respone)",$e);
            throw $e;
        }
    }
    private function writeInquiryLog($key, $data)
    {
        if (config("app.WRITE_LOG")) {
            Log::channel('inquiry')->info("    ");
            Log::channel('claim')->debug("...............Start......................");
            Log::channel('claim')->debug("Time : " . now());
            $data = ['key' => $key, "data" => $data];
            Log::channel('claim')->info($data);
            Log::channel('claim')->info(".................End....................");
            Log::channel('inquiry')->info("    ");
        }
    }
}