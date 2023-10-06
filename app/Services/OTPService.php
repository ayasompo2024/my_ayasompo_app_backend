<?php
namespace App\Services;

use App\Repositories\OTPRepository;

class OTPService
{
    public function addToCustomerFilledOTPColumn($request)
    {
        return OTPRepository::updateToCustomerFilledOTPColumn($request->created_shop_id, ['customer_filled_otp' => $request->otp_code]);
    }

    public function checkOTPForShopCreate($phone, $otp_code, $created_shop_id)
    {
        return OTPRepository::checkOTPForShopCreate($phone, $otp_code, $created_shop_id);
    }


}