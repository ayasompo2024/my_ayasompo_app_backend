<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\app\StoreInquiryCaseRequest;
use App\Services\api\app\RequestFormService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;

class RequestFormController extends Controller
{
    use ApiResponser;
    public function storeInquiryCase(StoreInquiryCaseRequest $request, RequestFormService $requestFormService)
    {
        return $requestFormService->storeInquiryCase($request);
        $status = $requestFormService->storeInquiryCase($request);
        return $status ? $this->successResponse("Request", $status, 201) :
            $this->errorResponse("Fail", 500);
    }
    public function getEndorsementForm(Request $request, RequestFormService $requestFormService)
    {
        $validator = $this->isIncludeFields($request, "product_code");
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        return $this->successResponse("Endorsement Request Form", $this->prepareEndorsementForm($requestFormService->getEndorsementForm($request->product_code)), 200);
    }
    private function prepareEndorsementForm($row)
    {
        return $row->map(function ($requestForm) {
            return
                [
                    'id' => $requestForm->requestRormType->id,
                    'type' => $requestForm->requestRormType->type
                ];
        });
    }

}
