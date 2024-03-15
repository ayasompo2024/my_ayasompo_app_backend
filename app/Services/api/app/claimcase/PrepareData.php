<?php
namespace App\Services\api\app\claimcase;


trait PrepareData
{

    //For API
    function prepareDataForMotorClaimAPI($request)
    {
        $data = [
            "vehicle_no" => $request->vehicle_no,
            "driver_name" => $request->driver_name,
            "contact_fullname" => $request->contact_fullname,
            "contact_telephone" => $request->contact_telephone,
            "accident_location" => $request->accident_location,
            "accident_date" => $request->accident_date,
            "accident_time" => $request->accident_time,
            "accident_description" => $request->accident_description,
            "accident_damaged_portion" => $request->accident_damaged_portion,
            "claim_channel" => "app",
            "ayas_policy" => [
                "NAME" => $request->contact_fullname,
                "PHONE_NO" => $request->contact_telephone,
                "CUSTOMER_CODE" => $request->customer_code,
                "RISK_NAME" => $request->vehicle_no,
                "PRODUCT_CODE" => $request->product_code,
                "CLASS_CODE" => $request->class_code,
                "RISK_SEQ_NO" => $request->risk_seq_no,
                "POLICY_NO" => $request->policy_no,
                "CUSTOMER_TYPE" => $request->customer_type
            ]
        ];
        return $data;
    }

    function prepareDataForNonMotorClaimAPI($request, $accidentDamagedPhotos, $signature_image)
    {
        $data = [
            "policy_or_risk_name" => $request->policy_or_risk_name,
            "contact_fullname" => $request->contact_fullname,
            "contact_telephone" => $request->contact_telephone,
            "nrc_no" => $request->nrc_no,
            "passport_no" => $request->passport_no,
            "product_type" => $request->product_type,
            "accident_date" => $request->accident_date,
            "accident_time" => $request->accident_time,
            "accident_description" => $request->accident_description,
            "accident_damaged_photos" => $accidentDamagedPhotos,
            "signature_image" => $signature_image,
            "claim_channel" => "app"
        ];
        return $data;
    }



    //For Lara Store
    function prepareDataStoreMotorCase($request)
    {
        $data = [
            "app_customer_id" => $request->user_id,
            "claim_channel" => "app",

            "vehicle_no" => $request->vehicle_no,
            "driver_name" => $request->driver_name,
            "contact_fullname" => $request->contact_fullname,
            "contact_telephone" => $request->contact_telephone,
            "accident_location" => $request->accident_location,
            "accident_date" => $request->accident_date,
            "accident_time" => $request->accident_time,
            "accident_description" => $request->accident_description,
            "accident_damaged_portion" => $request->accident_damaged_portion,

            "customer_code" => $request->customer_code,
            "risk_name" => $request->vehicle_no,
            "product_code" => $request->product_code,
            "class_code" => $request->class_code,
            "risk_seq_no" => $request->risk_seq_no,
            "policy_no" => $request->policy_no,
            "customer_type" => $request->customer_type
        ];
        return $data;
    }

}

/* vehicle_no == RISK_NAME */


// "_id": "6551e30b93ac0b0c98162479",
// "dynamic365ContactId": "6e0b7f0b-2559-ee11-be6f-002248ecf212",
// "dynamic365ClaimCaseId": "bf954882-0182-ee11-8179-000d3a85e8c0",
// "dynamic365ClaimCaseNo": "AYA-CL-23000494",
// "no": 1155,

























