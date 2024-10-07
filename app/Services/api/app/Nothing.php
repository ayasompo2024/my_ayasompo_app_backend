<?php

namespace App\Services\api\app;

use App\Models\RequestForm;
use App\Repositories\LogRepository;
use App\Repositories\ProductCodeListRequestFormTypeRepo;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Log;

class Nothing
{
    public function getEndorsementForm($product_code)
    {
        return ProductCodeListRequestFormTypeRepo::getEndorsementFormByProductCode($product_code);
    }

    public function storeInquiryCase($request)
    {
        $customerid_contact = null;
        if ($request->customer_type == 'I') {
            $individual = $this->getIndividualCustomerIDByCusCode($request->ayasompo_customercode);
            if (isset($individual[0])) {
                $customerid_contact = '/contacts('.$individual[0]['contactid'].')';
            }
        } else {
            $coorporate = $this->getCoorporateCustomerIDByCusCode($request->ayasompo_customercode);
            if (isset($coorporate[0])) {
                $customerid_contact = '/accounts('.$coorporate[0]['accountid'].')';
            }
        }
        if ($customerid_contact == null) {
            $this->log('Can not receive Customer ID from upstream server (ayasompo_customercode ='.$request->ayasompo_customercode, 0);

            return 1;
        }

        $dataForinternal = $this->prepareDateForInquiryCase($customerid_contact, $request);
        if ($this->createInquiryCase($dataForinternal) != null) {
            $this->log('Can not create InquiryCase to upstream server', 0);

            return 2;
        }

        $case_id = $dataForinternal['ayasompo_caseid'];
        $getCaseNumber = $this->getCaseNumberByAYASCaseID($case_id);
        if (! isset($getCaseNumber[0])) {
            $this->log('Can not receive CaseNumber from upstream server with provided '.$case_id, 0);

            return 3;
        }

        $input = array_merge($dataForinternal, $this->appDataForLara($request));
        $input['incidentid'] = $getCaseNumber[0]['incidentid'];
        $input['ayasompo_casenumber'] = $getCaseNumber[0]['ayasompo_casenumber'];
        $responseData = [
            'incidentid' => $getCaseNumber[0]['incidentid'],
            'ayasompo_casenumber' => $getCaseNumber[0]['ayasompo_casenumber'],
        ];

        return RequestForm::create($input) ? $responseData : false;
    }

    private function getIndividualCustomerIDByCusCode($cusCode)
    {
        $serviceRoot = config('app.service_root');
        $url = $serviceRoot."contacts?\$select=fullname&\$filter=ayasompo_customercode eq '".$cusCode."'";
        try {
            $crmClient = new Client([
                'base_uri' => $serviceRoot,
                'headers' => [
                    'Authorization' => 'Bearer '.Cache::get('CRM_API_Token'),
                    'Accept' => 'application/json',
                ],
            ]);
            $response = $crmClient->get($url);
            $this->writeInquiryLog('getIndividualCustomerIDByCusCode (Upstream Server Respone)', json_decode($response->getBody(), true));

            return json_decode($response->getBody(), true)['value'];
        } catch (RequestException $e) {
            $this->writeInquiryLog('getIndividualCustomerIDByCusCode (Upstream Server Respone)', $e);
            throw $e;
        }
    }

    private function getCoorporateCustomerIDByCusCode($cusCode)
    {
        $serviceRoot = config('app.service_root');
        $url = $serviceRoot."accounts?\$select=name&\$filter=ayasompo_code eq '".$cusCode."'";
        try {
            $crmClient = new Client([
                'base_uri' => $serviceRoot,
                'headers' => [
                    'Authorization' => 'Bearer '.Cache::get('CRM_API_Token'),
                    'Accept' => 'application/json',
                ],
            ]);
            $response = $crmClient->get($url);
            $this->writeInquiryLog('getCoorporateCustomerIDByCusCode (Upstream Server Respone)', json_decode($response->getBody(), true));

            return json_decode($response->getBody(), true)['value'];
        } catch (RequestException $e) {
            $this->writeInquiryLog('getIndividualCustomerIDByCusCode (Upstream Server Respone)', $e);
            throw $e;
        }
    }

    private function createInquiryCase($data)
    {
        $create_inquiry_case_url = config('app.CRM_BASE_URL').'api/data/v9.1/incidents';
        try {
            $crmClient = new Client([
                'base_uri' => $create_inquiry_case_url,
                'headers' => [
                    'Authorization' => 'Bearer '.Cache::get('CRM_API_Token'),
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
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

    private function getCaseNumberByAYASCaseID($case_id)
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

    private function appDataForLara($request)
    {
        return [
            'app_customer_id' => $request->user()->id,
            'inquiry_type' => $request->inquiry_type,

            'title' => $request->title,
            'reason' => $request->reason,
            'effective_date' => $request->effective_date,
            'bank_account_number' => $request->bank_account_number,
            'bank_name' => $request->bank_name,
            'other_bank_name' => $request->other_bank_name,
            'other_bank_address' => $request->other_bank_address,
        ];
    }

    private function staticData()
    {
        return [
            'casetypecode' => 2,
            'ayasompo_enquirychannels' => 13,
            'ayasompo_enquiryproducttype@odata.bind' => config('app.enquiry_product_type'),
            'ayasompo_enquirytypes@odata.bind' => config('app.enquiry_type'),
            'ayasompo_accounthandlerlookup@odata.bind' => config('app.account_handler'),
        ];
    }

    private function appDataForCRM($request)
    {
        $cancleFormData =
            $request->reason.','
            .$request->effective_date.','
            .$request->bank_account_number.','
            .$request->bank_name.','
            .$request->other_bank_name.','
            .$request->other_bank_address.',';

        return [
            'ayasompo_remark' => $cancleFormData,
            'title' => $request->title,
            'ayasompo_vehicleno' => $request->ayasompo_vehicleno,
            'ayasompo_customercode' => $request->ayasompo_customercode,
            'ayasompo_policyno' => $request->ayasompo_policyno,
            'ayasompo_productcode' => $request->ayasompo_productcode,
            'ayasompo_classcode' => $request->ayasompo_classcode,
            'ayasompo_risksequenceno' => $request->ayasompo_risksequenceno,
            'ayasompo_phonenotonotifycustomer' => $request->user()->customer_phoneno,
        ];
    }

    private function prepareDateForInquiryCase($customerid_contact, $request)
    {
        $staticData = $this->staticData();
        $appData = $this->appDataForCRM($request);
        $adiData = [
            'customerid_contact@odata.bind' => $customerid_contact,
            'ayasompo_caseid' => uniqid(),
            'ayasompo_inquirydatetime' => now(),
        ];

        return array_merge($staticData, $appData, $adiData);
    }

    private function log($message, $customer_id = null)
    {
        LogRepository::store([
            'trace_id' => uniqid(),
            'customer_id' => $customer_id,
            'message' => $message,
        ]);
    }

    private function writeInquiryLog($key, $data)
    {
        if (config('app.WRITE_LOG')) {
            Log::channel('inquiry')->debug('...............Start......................');
            Log::channel('inquiry')->debug('Time : '.now());
            $data = ['key' => $key, 'data' => $data];
            Log::channel('inquiry')->info($data);
            Log::channel('inquiry')->info('.................End....................');
        }
    }
}
