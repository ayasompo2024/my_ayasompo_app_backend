<?php
namespace App\Services\api\app\inquiry;


trait PrepareData
{
    function staticData()
    {
        return [
            "casetypecode" => 2,
            "ayasompo_enquirychannels" => 13,
            "ayasompo_enquiryproducttype@odata.bind" => config('app.enquiry_product_type'),
            "ayasompo_enquirytypes@odata.bind" => config('app.enquiry_type'),
            "ayasompo_accounthandlerlookup@odata.bind" => config('app.account_handler'),
        ];
    }
    function appDataForCRM($request)
    {
        $cancleFormData =
            $request->reason . ","
            . $request->effective_date . ","
            . $request->bank_account_number . ","
            . $request->bank_name . ","
            . $request->other_bank_name . ','
            . $request->other_bank_address . ',';
        return [
            "ayasompo_remark" => $cancleFormData,
            "title" => $request->title,
            "ayasompo_vehicleno" => $request->ayasompo_vehicleno,
            "ayasompo_customercode" => $request->ayasompo_customercode,
            "ayasompo_policyno" => $request->ayasompo_policyno,
            "ayasompo_productcode" => $request->ayasompo_productcode,
            "ayasompo_classcode" => $request->ayasompo_classcode,
            "ayasompo_risksequenceno" => $request->ayasompo_risksequenceno,
            "ayasompo_phonenotonotifycustomer" => $request->user()->customer_phoneno
        ];
    }
    function prepareDateForInquiryCase($customerid_contact, $request)
    {
        $staticData = $this->staticData();
        $appData = $this->appDataForCRM($request);
        $adiData = [
            "customerid_contact@odata.bind" => $customerid_contact,
            "ayasompo_caseid" => uniqid(),
            "ayasompo_inquirydatetime" => now()
        ];
        return array_merge($staticData, $appData, $adiData);
    }

    function appDataForLara($request)
    {
        return [
            "app_customer_id" => $request->user()->id,
            "inquiry_type" => $request->inquiry_type,

            "title" => $request->title,
            "reason" => $request->reason,
            "effective_date" => $request->effective_date,
            "bank_account_number" => $request->bank_account_number,
            "bank_name" => $request->bank_name,
            "other_bank_name" => $request->other_bank_name,
            "other_bank_address" => $request->other_bank_address,
        ];
    }

}




















