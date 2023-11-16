<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ClaimcaseService;
use Illuminate\Http\Request;

class ClaimcaseController extends Controller
{

    function index(ClaimcaseService $claimcaseService)
    {
        return redirect()->route('admin.claim-case.motor');
        // return view('admin.claim-case.index', with([
        //     'claims' => $claimcaseService->index(15)
        // ]));
    }
    
    function motorCase(ClaimcaseService $claimcaseService)
    {
        return view('admin.claim-case.motor', with([
            'motor' => $claimcaseService->motorCase(30)
        ]));
    }

    function nonMotorCase(ClaimcaseService $claimcaseService)
    {
        return view('admin.claim-case.nonmotor', with([
            'nonmotor' => $claimcaseService->nonMotorCase(30)
        ]));
    }
}

