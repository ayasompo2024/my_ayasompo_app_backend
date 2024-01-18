<?php

namespace App\Http\Controllers\api\internal;

use App\Http\Controllers\Controller;
use App\Services\api\internal\CustomerService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    use ApiResponser;
    public function sendClaimNoti(Request $request, CustomerService $customerService)
    {
        $validator = $this->validationForSendClaimNoti($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $status = $customerService->sendClaimNoti($request);

        return $status ?
            $this->successResponse("Your request has been processed (Claim Noti)", $status, 200) :
            $this->errorResponse("Fail", 500);
    }
    public function sendInquiryNoti(Request $request, CustomerService $customerService)
    {
        $validator = $this->validationForSendInquiryNoti($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $status = $customerService->sendInquiryNoti($request);

        return $status ?
            $this->successResponse("Your request has been processed (Inquiry Noti)", $status, 200) :
            $this->errorResponse("Fail", 500);
    }
    //For E-Claim
    private function validationForSendClaimNoti($request)
    {
        return Validator::make($request->all(), [
            "customer_phoneno" => ["required", "min:6", "max:13"],
            "customer_code" => ["required", "min:6", "max:15"],
            "message" => "required",
            "claim_no" => "required",
        ]);
    }
    //For Inquiry
    private function validationForSendInquiryNoti($request)
    {
        return Validator::make($request->all(), [
            "customer_phoneno" => ["required", "min:6", "max:13"],
            "customer_code" => ["required", "min:6", "max:15"],
            "message" => "required",
            "case_title" => "required",
            "case_id" => "nullable",
            'status' => [
                'nullable',
                Rule::in(['In Progress', 'On Hold', 'Waiting For Details', 'Researching'])
            ],
        ]);
    }
}

