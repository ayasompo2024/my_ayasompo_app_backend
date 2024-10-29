<?php

namespace App\Services\api\internal;

use App\Models\Customer;
use App\Repositories\RequestFormRepository;
use App\Traits\Firebase;
use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\SendPushNotification;

class CustomerService
{
    use Firebase, RemoveInitialPlusNineFiveNine, SendPushNotification;

    public function sendClaimNoti($inputFromInternal)
    {
        $customer = Customer::query()->whereCustomer_phoneno($this->removeInitialPlusNineFiveNine($inputFromInternal->customer_phoneno))->first();
        $notification = ['title' => $inputFromInternal->message, 'body' => 'Claim No : '.$inputFromInternal->claim_no.', Customer Code : '.$inputFromInternal->customer_code];

        $this->sendNotification($customer->device_token, $notification['title'], $notification['body'], null, []);
        $this->sendAsUnicastFroIOS($customer->device_token, $notification, $notification);

        return $inputFromInternal->all();
    }

    public function sendInquiryNoti($inputFromInternal)
    {
        $customer = Customer::query()->where('customer_phoneno', $this->removeInitialPlusNineFiveNine($inputFromInternal->customer_phoneno))->first();
        $notification = [
            'title' => $inputFromInternal->case_title,
            'body' => $inputFromInternal->message,
        ];
        $this->sendNotification($customer->device_token, $notification['title'], $notification['body'], null, $notification);
        $this->sendAsUnicastFroIOS($customer->device_token, $notification, $notification);
        $this->updateRequestformStatus($inputFromInternal);

        return $inputFromInternal->all();
    }

    private function updateRequestformStatus($request)
    {
        $input = [
            'inquiry_status' => $request->status,
            'is_read' => 0,
        ];
        RequestFormRepository::updateStatusByCaseID($request->case_id, $input);
    }
}
