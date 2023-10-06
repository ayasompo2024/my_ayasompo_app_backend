<?php
namespace App\Repositories;

use Carbon\Carbon;

use App\Models\OTP;

class OTPRepository
{
    public static function store(array $input)
    {
        OTP::create($input);
    }

    public static function updateToCustomerFilledOTPColumn($shop_id, array $data)
    {
        return OTP::query()->where('shop_id', $shop_id)->update($data);
    }
    public static function checkOTPForShopCreate($phone, $otp_code, $created_shop_id)
    {
        return OTP::where(function ($query) use ($phone, $otp_code, $created_shop_id) {
            $query
                ->where('phone_number', $phone)
                ->where('otp_code', $otp_code)
                ->where("shop_id", $created_shop_id)
                ->where('created_at', '>', Carbon::now()->subMinutes(30))
                ->where("type", "shop_store");
        })->exists();
    }
}