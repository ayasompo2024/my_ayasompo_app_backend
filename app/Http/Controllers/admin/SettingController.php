<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;
use App\Traits\SendSms;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    use SendSms;
    public function getSmsInfo(SettingRepository $setting_repository)
    {
        $sms_info = $setting_repository->getSmsApiInfo();
        $credits = $this->getBalance()->data->credits;
        return view('admin.settings.sms-info', compact('sms_info', 'credits'));
    }
    public function index()
    {
        return 'index';
    }

    private function getBalance()
    {
        $end_point = "https://smspoh.com/api/v2/get-balance";
        $auth_token = "H7snT1KcSj4aYqn9Af-hi9_xwgdI6vicsHtQHBF3SWdUHcE1R81a1EJvlUlFTnk2";
        $header = [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $auth_token
        ];

        $curl = curl_init();
        curl_setopt_array(
            $curl,
            [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",

                CURLOPT_URL => $end_point,
                CURLOPT_HTTPHEADER => $header,
            ]
        );

        $response = curl_exec($curl);
        $response = json_decode($response);
        if ($response->status)
            return $response;
        else
            return false;
    }
}