<?php
namespace App\Services\api\app;

use App\Repositories\ProductCodeListRequestFormTypeRepo;

class RequestFormService
{

    function getEndorsementForm($product_code)
    {
        return ProductCodeListRequestFormTypeRepo::getEndorsementFormByProductCode($product_code);
    }

    function storeInquiryCase($request)
    {
        $customerid_contact = null;
        if ($request->customer_type == "I")
            $customerid_contact = $this->GetIndividualCustomerIDByCusCode($request->ayasompo_customercode);
        else
            $customerid_contact = $this->GetCoorporateCustomerIDByCusCode($request->ayasompo_customercode);

        return $this->prepareDateForInquiryCase($customerid_contact, $request);
    }

    private function GetIndividualCustomerIDByCusCode($cusCode)
    {
        return "https://ayascrmsit.crm5.dynamics.com/api/data/v9.1/contacts?\$select=fullname&\filter=ayasompo_customercode eq '" . $cusCode . "'";
    }

    private function GetCoorporateCustomerIDByCusCode($cusCode)
    {
        return "https://ayascrmsit.crm5.dynamics.com/api/data/v9.1/accounts\$select=name&\$filter=ayasompo_code eq " . $cusCode . "'";
    }

    private function prepareDateForInquiryCase($customerid_contact, $request)
    {
        $staticData = [
            "casetypecode" => 2,
            "ayasompo_enquirychannels" => 12,
            "ayasompo_enquiryproducttype@odata.bind" => config('app.enquiry_product_type'),
            "ayasompo_enquirytypes@odata.bind" => config('app.enquiry_type'),
            "ayasompo_accounthandlerlookup@odata.bind" => config("app.account_handler"),
        ];
        $cancleFormData =
            $request->reason . ","
            . $request->effective_date . ","
            . $request->bank_account_number . ","
            . $request->bank_name . ","
            . $request->other_bank_name . ','
            . $request->other_bank_address . ',';
        $appData = [
            "ayasompo_remark" => $cancleFormData,
            "title" => $request->title,
            "ayasompo_vehicleno" => $request->ayasompo_vehicleno,
            "ayasompo_customercode" => $request->ayasompo_customercode,
            "ayasompo_policyno" => $request->ayasompo_policyno,
            "ayasompo_productcode" => $request->ayasompo_productcode,
            "ayasompo_classcode" => $request->ayasompo_classcode,
            "ayasompo_risksequenceno" => $request->ayasompo_risksequenceno,
        ];
        $adiData = [
            "customerid_contact@odata.bind" => $customerid_contact,
            "ayasompo_caseid" => uniqid(),
            "ayasompo_inquirydatetime" => now()
        ];
        return array_merge($staticData, $appData, $adiData);
    }
    private function GetCaseNumberByAYASCaseID()
    {

    }
}


