<?php

namespace App\Http\Controllers\api\internal;

use App\Http\Controllers\Controller;

use App\Models\InternalAccessList;

use App\Services\api\internal\AuthService;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    use ApiResponser;
    public function generateInterAccessToken(Request $request, AuthService $authService)
    {
        $validator = $this->isIncludeFields($request, "access_id");
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $info = $authService->generateInterAccessToken($request);
        return $info ? $this->successResponse("Your Access Token", $info, 200) :
            $this->errorResponse('access_id Do Not Match', 401);
    }
}