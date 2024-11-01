<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Models\TermAndCondition;
use App\Traits\api\ApiResponser;
use Exception;

class AppTermAndCondition extends Controller
{
    use ApiResponser;

    public function index()
    {
        try {
            $termAndCondition = TermAndCondition::where(['status' => 'ACTIVE'])->first();

            return $this->successResponse('term and condition list is retrived successfully', $termAndCondition);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
