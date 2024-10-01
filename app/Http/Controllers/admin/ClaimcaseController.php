<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ClaimcaseService;

class ClaimcaseController extends Controller
{
    public function index(ClaimcaseService $claimcaseService)
    {
        return redirect()->route('admin.claim-case.motor');
        // return view('admin.claim-case.index', with([
        //     'claims' => $claimcaseService->index(15)
        // ]));
    }

    public function motorCase(ClaimcaseService $claimcaseService)
    {
        $motorCases = $claimcaseService->motorCase(10);

        return view('admin.claim-case.motor', with([
            'paginate' => $motorCases,
            'unserializeData' => $this->unserializeData($motorCases),
        ]));
    }

    private function unserializeData($datas)
    {
        return $datas->map(function ($data) {
            return [
                'id' => $data->id,
                'app_customer_id' => $data->app_customer_id,
                'claim_channel' => $data->claim_channel,
                'vehicle_no' => $data->vehicle_no,
                'driver_name' => $data->driver_name,
                'contact_fullname' => $data->contact_fullname,
                'contact_telephone' => $data->contact_telephone,
                'accident_location' => $data->accident_location,
                'accident_date' => $data->accident_date,
                'accident_time' => $data->accident_time,
                'accident_description' => $data->accident_description,
                'accident_damaged_portion' => $data->accident_damaged_portion,
                'customer_code' => $data->customer_code,
                'risk_name' => $data->risk_name,
                'product_code' => $data->product_code,
                'class_code' => $data->class_code,
                'risk_seq_no' => $data->risk_seq_no,
                'policy_no' => $data->policy_no,
                'customer_type' => $data->customer_type,
                'signature_image' => $data->signature_image,
                'accident_damaged_photos' => unserialize($data->accident_damaged_photos),
                'created_at' => $data->created_at,
            ];
        });
    }

    public function nonMotorCase(ClaimcaseService $claimcaseService)
    {
        $motorCases = $claimcaseService->nonMotorCase(30);

        return view('admin.claim-case.nonmotor', with([
            'paginate' => $motorCases,
            'unserializeData' => $this->unserializeDataForNonMotor($motorCases),
        ]));
    }

    private function unserializeDataForNonMotor($datas)
    {
        return $datas->map(function ($data) {
            return [
                'id' => $data->id,
                'app_customer_id' => $data->app_customer_id,
                'policy_or_risk_name' => $data->policy_or_risk_name,
                'contact_fullname' => $data->contact_fullname,
                'contact_telephone' => $data->contact_telephone,
                'nrc_no' => $data->nrc_no,
                'passport_no' => $data->passport_no,
                'product_type' => $data->product_type,
                'accident_date' => $data->accident_date,
                'accident_time' => $data->accident_time,
                'accident_description' => $data->accident_description,
                'accident_damaged_photos' => unserialize($data->accident_damaged_photos),
                'signature_image' => $data->signature_image,
                'claim_channel' => $data->claim_channel,
            ];
        });
    }
}
