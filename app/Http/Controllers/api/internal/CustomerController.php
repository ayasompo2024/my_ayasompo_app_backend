<?php

namespace App\Http\Controllers\api\internal;

use App\Http\Controllers\Controller;

use App\Services\internal\CustomerService;
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

        $status = $customerService->sendMessage($request->only("phone", "customer_code", "message"));
        return $status ?
            $this->successResponse("Your request has been processed", $request->only("phone", "customer_code", "message"), 200) :
            $this->errorResponse("Fail", 500);
    }

    private function validationForSendMessage($request)
    {
        return Validator::make($request->all(), [
            "phone" => ["required", "min:6", "max:12"],
            "customer_code" => ["required", "min:6", "max:15"],
            "message" => "required",
        ]);
    }

}