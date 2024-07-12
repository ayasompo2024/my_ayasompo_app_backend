<?php
namespace App\Services\api\internal;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\RequestFormRepository;
use App\Traits\RemoveInitialPlusNineFiveNine;
use App\Traits\SendPushNotification;

class CustomerService
{
    use SendPushNotification, RemoveInitialPlusNineFiveNine;
    public function sendClaimNoti($inputFromInternal)
    {
        $customer = Customer::query()->whereCustomer_phoneno($this->removeInitialPlusNineFiveNine($inputFromInternal->customer_phoneno))->first();
        \Log::info($customer);
        $notification = ["title" => $inputFromInternal->message, "body" => "Claim No : " . $inputFromInternal->claim_no . ", Customer Code : " . $inputFromInternal->customer_code];
        $this->sendAsUnicast($customer->device_token, $notification, $notification);
        return $inputFromInternal->all();
    }
    public function sendInquiryNoti($inputFromInternal)
    {
        $customer = Customer::query()->whereCustomer_phoneno($this->removeInitialPlusNineFiveNine($inputFromInternal->customer_phoneno))->first();
        \Log::info($customer);
        $notification = [
            "title" => $inputFromInternal->case_title,
            "body" => $inputFromInternal->message,
        ];
        $this->sendAsUnicast($customer->device_token, $notification, $notification);
        $this->updateRequestformStatus($inputFromInternal);
        return $inputFromInternal->all();
    }
    private function updateRequestformStatus($request)
    {
        $input = [
            "inquiry_status" => $request->status,
            "is_read" => 0
        ];
        RequestFormRepository::updateStatusByCaseID($request->case_id, $input);
    }
}

