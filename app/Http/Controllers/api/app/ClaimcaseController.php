<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;

use App\Http\Requests\api\app\MotorClaimcaseRequest;
use App\Http\Requests\api\app\NonMotorClaimcaseRequest;
use App\Services\api\app\claimcase\ClaimcaseService;
use App\Traits\api\ApiResponser;
use Log;
use Illuminate\Support\Facades\Storage;

class ClaimcaseController extends Controller
{
    use ApiResponser;
    function motorCase(MotorClaimcaseRequest $request, ClaimcaseService $claimcaseService)
    {
        $this->writeInquiryLog("motorCase : Application Request", $request->all());
        $status = $claimcaseService->motorCase($request);

        if ($status == 1)
            return $this->issueResponse("Can not upload photo to blob storage", 1, 502);

        if ($status == 2)
            return $this->issueResponse("Uploaded photo, but can not create claim case to upstream server", 2, 502);

        if (!$status)
            return $this->successResponse("Motor Claimcase Success to Upstream server ,but can't save to DB", $status, 200);

        return $this->successResponse("Claimcase Success(All Step) ", $status, 201);
    }
    function nonMotorCase(NonMotorClaimcaseRequest $request, ClaimcaseService $claimcaseService)
    {
        $this->writeInquiryLog("NonMotorClaimcaseRequest : Application Request", $request->all());
        $status = $claimcaseService->nonMotorCase($request);

        if ($status == 1)
            return $this->issueResponse("Can not upload photo to blob storage", 1, 502);

        if ($status == 2)
            return $this->issueResponse("Uploaded photo, but can not create claim case to upstream server", 2, 502);

        if (!$status)
            return $this->successResponse("Motor Claimcase Success to Upstream server ,but can't save to DB", $status, 200);

        return $this->successResponse("Claimcase Success(All Step) ", $status, 201);
    }
    private function writeInquiryLog($key, $data)
    {
        if (config("app.WRITE_LOG")) {
            $logChannel = 'claim';
            $logFilePath = storage_path("logs/{$logChannel}.log");
            if (file_exists($logFilePath)) {
                unlink($logFilePath);
            }
            $data = ['key' => $key, "data" => $data];
            Log::channel('claim')->info($data);
        }
    }
}

