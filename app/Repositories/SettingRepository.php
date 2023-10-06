<?php
namespace App\Repositories;

use App\Models\SmsSetting;
use Illuminate\Support\Facades\Cache;


class SettingRepository
{
    public function getSmsApiInfo()
    {
        if (Cache::has('SMSINFO'))
            return Cache::get('SMSINFO');

        $sms_info = SmsSetting::find(1);
        Cache::rememberForever('SMSINFO', function () use ($sms_info) {
            return $sms_info;
        });
        return $sms_info;
    }
}