<?php
namespace App\Services\api\internal;

use App\Models\InternalAccessList;




class AuthService
{
    public function generateInterAccessToken($request)
    {
        $allowUser = InternalAccessList::whereAccess_id($request->access_id)->first();
        if (empty($allowUser))
            return false;
        $token = $allowUser->createToken('internal_server_api_token')->accessToken;
        $info = [
            'access_token' => $token,
            "token_type" => "Bearer",
            "expire_in" => null,
            'accessor_info' => [
                'name' => $allowUser->name,
                'password' => null,
                'access_id' => $allowUser->access_id
            ]
        ];
        return $info;
    }
}