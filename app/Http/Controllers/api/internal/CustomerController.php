<?php

namespace App\Http\Controllers\api\internal;

use App\Http\Controllers\Controller;
use App\Services\api\internal\CustomerService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    use ApiResponser;
    public function sendMessage(Request $request, CustomerService $customerService)
    {
        $validator = $this->validationForSendMessage($request);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $status = $customerService->sendMessage($request);

        return $status ?
            $this->successResponse("Your request has been processed", $status, 200) :
            $this->errorResponse("Fail", 500);
    }

    //For E-Claim
    private function validationForSendMessage($request)
    {
        return Validator::make($request->all(), [
            "customer_phoneno" => ["required", "min:6", "max:13"],
            "customer_code" => ["required", "min:6", "max:15"],
            "message" => "required",
            "claim_no" => "required",
        ]);
    }
}


// {
//     "customer_phoneno" : "09787796698",   
//     "customer_code" : "C000051097",
//     "status" : "complete",
//     "case_id": "654b40579039b", 
//     "casee_number" : "AYA-EQ-23000119"
// }