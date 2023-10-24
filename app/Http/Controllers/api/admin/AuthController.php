<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\api\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponser;
    public function login(Request $request)
    {
        $validator = $this->isIncludeFields($request, "email,password");
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $info = $this->check($request);
        return $info ? $this->successResponse("Admin Login Success", $info, 200) :
            $this->errorResponse('Credentials Not Found', 403);
    }
    private function check($request)
    {
        $user = User::query()->whereEmail($request->email)->first();
        if (empty($user) || !Hash::check($request->password, $user->password))
            return false;

        $token = $user->createToken('admin_api')->accessToken;
        return [
            'admin' => [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->eami,
            ],
            'token' => $token
        ];
    }
}