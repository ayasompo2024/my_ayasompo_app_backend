<?php

namespace App\Http\Controllers\api\app;

use App\Http\Controllers\Controller;
use App\Traits\api\ApiResponser;
use Exception;

class AppTermAndCondition extends Controller
{
    use ApiResponser;

    public function index()
    {
        try {
            $termAndConditions = AppTermAndCondition::all();

            return $this->successResponse('term and condition list is retrived successfully', $termAndConditions);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
