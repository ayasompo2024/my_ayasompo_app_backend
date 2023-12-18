<?php
namespace App\Services\api\internal;

use App\Traits\SendPushNotification;
use App\Traits\SendSms;

class CustomerService
{
    use SendPushNotification, SendSms;
    public function sendMessage($inputFromInternal)
    {
        return $this->callSMSAPI($inputFromInternal->customer_phoneno, $inputFromInternal->message, "Spidey Shine", $inputFromInternal->claim_no);
    }
}