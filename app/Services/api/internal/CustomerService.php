<?php
namespace App\Services\api\internal;


use App\Traits\SendPushNotification;


class CustomerService
{
    use SendPushNotification;
    public function sendMessage($inputFromInternal)
    {
        
        return $inputFromInternal;
    }

}