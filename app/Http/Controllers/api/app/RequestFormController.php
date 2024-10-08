<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\app\StoreInquiryCaseRequest;
use App\Models\RequestForm;
use App\Services\api\app\inquiry\RequestFormService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Log;

class RequestFormController extends Controller
{
    use ApiResponser;

    public function storeInquiryCase(StoreInquiryCaseRequest $request, RequestFormService $requestFormService)
    {
        $this->writeInquiryLog('store-inquiry-case : Request', $request->all());
        $status = $requestFormService->storeInquiryCase($request);
        if ($status == 1) {
            return $this->issueResponse('Can not receive Customer ID from upstream server', 1, 502);
        }
        if ($status == 2) {
            return $this->issueResponse('Can not create InquiryCase to upstream server', 2, 502);
        }
        if ($status == 3) {
            return $this->issueResponse('Can not receive CaseNumber from CRM from upstream server', 3, 502);
        }
        if (! $status) {
            return $this->errorResponse('Fail', 500);
        }

        return $this->successResponse('Success InquiryCase', $status, 201);
    }

    public function getEndorsementForm(Request $request, RequestFormService $requestFormService)
    {
        $this->writeInquiryLog('get-endorsement-form : Request', $request->all());
        $validator = $this->isIncludeFields($request, 'product_code');
        if ($validator->fails()) {
            return $this->respondValidationErrors('Validation Error', $validator->errors(), 400);
        }

        return $this->successResponse('Endorsement Request Form', $this->prepareEndorsementForm($requestFormService->getEndorsementForm($request->product_code)), 200);
    }

    private function prepareEndorsementForm($row)
    {
        return $row->map(function ($requestForm) {
            return
                [
                    'id' => $requestForm->requestRormType->id,
                    'type' => $requestForm->requestRormType->type,
                ];
        });
    }

    public function read($id)
    {
        $requestForm = RequestForm::find($id);
        $requestForm->update(['is_read' => 1]);

        return $requestForm->refresh();
    }

    private function writeInquiryLog($key, $data)
    {
        if (config('app.WRITE_LOG')) {
            $logChannel = 'inquiry';
            $logFilePath = storage_path("logs/{$logChannel}.log");
            if (file_exists($logFilePath)) {
                unlink($logFilePath);
            }
            $data = ['key' => $key, 'data' => $data];
            Log::channel('inquiry')->info($data);
        }
    }
}
