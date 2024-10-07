<?php

namespace App\Services\api\app\inquiry;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Log;

trait CallAPI
{
    private function headerValue()
    {
        return [
            'Authorization' => 'Bearer '.Cache::get('CRM_API_Token'),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    public function getIndividualCustomerIDByPhone($phone)
    {
        $serviceRoot = config('app.service_root');
        $mutedPhone = ltrim($phone, '0');
        $url = $serviceRoot."contacts?\$select=fullname&\$filter=telephone1 eq '%2B".'95'.$mutedPhone."'";
        try {
            $crmClient = new Client([
                'base_uri' => $serviceRoot,
                'headers' => $this->headerValue(),
            ]);
            $response = $crmClient->get($url);
            $this->writeInquiryLog('getIndividualCustomerIDByCusCode (Upstream Server Respone)', json_decode($response->getBody(), true));

            return json_decode($response->getBody(), true)['value'];
        } catch (RequestException $e) {
            $this->writeInquiryLog('getIndividualCustomerIDByCusCode (Upstream Server Respone)', $e);
            throw $e;
        }
    }

    public function getIndividualCustomerIDByCusCode($cusCode)
    {
        $serviceRoot = config('app.service_root');
        $url = $serviceRoot."contacts?\$select=fullname&\$filter=ayasompo_customercode eq '".$cusCode."'";
        try {
            $crmClient = new Client([
                'base_uri' => $serviceRoot,
                'headers' => $this->headerValue(),
            ]);
            $response = $crmClient->get($url);
            $this->writeInquiryLog('getIndividualCustomerIDByCusCode (Upstream Server Respone)', json_decode($response->getBody(), true));

            return json_decode($response->getBody(), true)['value'];
        } catch (RequestException $e) {
            $this->writeInquiryLog('getIndividualCustomerIDByCusCode (Upstream Server Respone)', $e);
            throw $e;
        }
    }

    public function getCoorporateCustomerIDByCusCode($cusCode)
    {
        $serviceRoot = config('app.service_root');
        $url = $serviceRoot."accounts?\$select=name&\$filter=ayasompo_code eq '".$cusCode."'";
        try {
            $crmClient = new Client([
                'base_uri' => $serviceRoot,
                'headers' => $this->headerValue(),
            ]);
            $response = $crmClient->get($url);
            $this->writeInquiryLog('getCoorporateCustomerIDByCusCode (Upstream Server Respone)', json_decode($response->getBody(), true));

            return json_decode($response->getBody(), true)['value'];
        } catch (RequestException $e) {
            $this->writeInquiryLog('getIndividualCustomerIDByCusCode (Upstream Server Respone)', $e);
            throw $e;
        }
    }

    public function createInquiryCase($data)
    {
        $create_inquiry_case_url = config('app.CRM_BASE_URL').'api/data/v9.1/incidents';
        try {
            $crmClient = new Client([
                'base_uri' => $create_inquiry_case_url,
                'headers' => $this->headerValue(),
            ]);
            $response = $crmClient->post($create_inquiry_case_url, [
                'json' => $data,
            ]);
            $this->writeInquiryLog('createInquiryCase (Upstream Server Respone)', json_decode($response->getBody(), true));

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            $this->writeInquiryLog('createInquiryCase (Upstream Server Respone)', $e);
            throw $e;
        }
    }

    public function getCaseNumberByAYASCaseID($case_id)
    {
        $url = config('app.CRM_BASE_URL')."api/data/v9.1/incidents?\$select=incidentid,ayasompo_casenumber&\$filter=ayasompo_caseid eq '".$case_id."'";
        try {
            $crmClient = new Client([
                'base_uri' => $url,
                'headers' => [
                    'Authorization' => 'Bearer '.Cache::get('CRM_API_Token'),
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]);
            $response = $crmClient->get($url);
            $this->writeInquiryLog('getCaseNumberByAYASCaseID (Upstream Server Respone)', json_decode($response->getBody(), true));

            return json_decode($response->getBody(), true)['value'];
        } catch (RequestException $e) {
            $this->writeInquiryLog('getCaseNumberByAYASCaseID (Upstream Server Respone)', $e);
            throw $e;
        }
    }

    public function createCustomerInCRM($name, $phone)
    {
        $url = config('app.CRM_BASE_URL').'api/data/v9.1/contacts';
        try {
            $crmClient = new Client([
                'base_uri' => $url,
                'headers' => $this->headerValue(),
            ]);
            $response = $crmClient->post($url, [
                'json' => json_encode([
                    'lastname' => $name,
                    'telephone1' => $phone,
                ]),
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            throw $e;
        }
    }

    public function writeInquiryLog($key, $data)
    {
        if (config('app.WRITE_LOG')) {
            $data = ['key' => $key, 'data' => $data];
            Log::channel('inquiry')->info($data);
        }
    }
}
