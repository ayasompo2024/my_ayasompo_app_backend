<?php
namespace App\Services\api\internal;

use App\Repositories\CustomerRepository;
use App\Traits\SendPushNotification;

class CustomerService
{
    use SendPushNotification;
    public function sendClaimNoti($inputFromInternal)
    {
        $customers = CustomerRepository::getAllByProvidedPhone($inputFromInternal->customer_phoneno);
        $notification = ["title" => $inputFromInternal->message, "body" => "Claim No : " . $inputFromInternal->claim_no . ", Customer Code : " . $inputFromInternal->customer_code];
        foreach ($customers as $customer) {
            $this->sendAsUnicast($customer->device_token, $notification, $notification);
        }
        return $inputFromInternal->all();
        //return $this->callSMSAPI($inputFromInternal->customer_phoneno, $inputFromInternal->message, "Spidey Shine", $inputFromInternal->claim_no);
    }
    public function sendInquiryNoti($inputFromInternal)
    {
        $customers = CustomerRepository::getAllByProvidedPhone($inputFromInternal->customer_phoneno);
        $notification = [
            "title" => $inputFromInternal->message,
            "body" => "Case ID : " . $inputFromInternal->case_id . "(Status" . $inputFromInternal->status  . ") , Customer Code : " . $inputFromInternal->customer_code
        ];
        foreach ($customers as $customer) {
            $this->sendAsUnicast($customer->device_token, $notification, $notification);
        }
        return $inputFromInternal->all();
        //return $this->callSMSAPI($inputFromInternal->customer_phoneno, $inputFromInternal->message, "Spidey Shine", $inputFromInternal->claim_no);
    }
}

