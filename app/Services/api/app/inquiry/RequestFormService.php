<?php
namespace App\Services\api\app\inquiry;

use App\Models\RequestForm;
use App\Repositories\LogRepository;
use App\Repositories\ProductCodeListRequestFormTypeRepo;
use App\Traits\SendPushNotification;
use Illuminate\Support\Arr;

class RequestFormService
{
    use CallAPI, PrepareData, SendPushNotification;
    function getEndorsementForm($product_code)
    {
        return ProductCodeListRequestFormTypeRepo::getEndorsementFormByProductCode($product_code);
    }
    
    function storeInquiryCase($request)
    {
        $customerid_contact = null;
        if ($request->ayasompo_customercode != null) {
            if ($request->customer_type == "I") {
                $individual = $this->getIndividualCustomerIDByCusCode($request->ayasompo_customercode);
                if (isset ($individual[0]))
                    $customerid_contact = "/contacts(" . $individual[0]["contactid"] . ")";
            } else {
                $coorporate = $this->getCoorporateCustomerIDByCusCode($request->ayasompo_customercode);
                if (isset ($coorporate[0]))
                    $customerid_contact = "/accounts(" . $coorporate[0]["accountid"] . ")";
            }
        } else {
            $getCRMCustomer = $this->getIndividualCustomerIDByPhone($request->customer_phoneno);
            if (!isset ($getCRMCustomer[0])) {
                $res = $this->createCustomerInCRM($request->customer_name, $request->customer_phoneno);
                $getCRMCustomer = $this->getIndividualCustomerIDByPhone($request->customer_phoneno);
            }
            $customerid_contact = "/contacts(" . $getCRMCustomer[0]['contactid'] . ")";
        }
        if ($customerid_contact == null) {
            $this->log("Can not receive Customer ID from upstream server (ayasompo_customercode =" . $request->ayasompo_customercode, 0);
            return 1;
        }
        $dataForinternal = $this->prepareDateForInquiryCase($customerid_contact, $request);
        if ($this->createInquiryCase($dataForinternal) != null) {
            $this->log("Can not create InquiryCase to upstream server", 0);
            return 2;
        }

        $case_id = $dataForinternal["ayasompo_caseid"];
        $getCaseNumber = $this->getCaseNumberByAYASCaseID($case_id);
        if (!isset ($getCaseNumber[0])) {
            $this->log("Can not receive CaseNumber from upstream server with provided " . $case_id, 0);
            return 3;
        }

        $dataForinternal = Arr::except($dataForinternal, ['casetypecode', 'ayasompo_enquirychannels', 'ayasompo_enquiryproducttype@odata.bind', 'ayasompo_enquirytypes@odata.bind', 'ayasompo_accounthandlerlookup@odata.bind']);
        $input = array_merge($dataForinternal, $this->appDataForLara($request));
        $input["incidentid"] = $getCaseNumber[0]["incidentid"];
        $input["ayasompo_casenumber"] = $getCaseNumber[0]["ayasompo_casenumber"];

        $status = RequestForm::create($input);
        if ($status) {
            // if (!empty ($request->user())) {
            //     $this->sendNoti($request->user()->device_token, $request->user()->user_name, $getCaseNumber[0]["incidentid"], $getCaseNumber[0]["ayasompo_casenumber"]);
            // }
            return [
                "incidentid" => $getCaseNumber[0]["incidentid"],
                "ayasompo_casenumber" => $getCaseNumber[0]["ayasompo_casenumber"]
            ];
        } else {
            return false;
        }
    }

    private function sendNoti($token, $user_name, $incidentid, $casenumber)
    {
        $notification = [
            "title" => "Service Request Success",
            "body" => "Incident ID " . $incidentid . ", Case Number " . $casenumber
        ];
        $data = ["title" => "SERVICE_REQUEST", "body" => null];
        $this->sendAsUnicast($token, $notification, $data);
    }
    private function log($message, $customer_id = null)
    {
        LogRepository::store([
            "trace_id" => uniqid(),
            "customer_id" => $customer_id,
            "message" => $message,
        ]);
    }
}
