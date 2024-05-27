<?php

namespace App\Http\Resources\api\app\agent;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountCodesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "code" => $this->code
        ];
    }
}

/*
{
    "id": 623,
    "customer_code": "90232",
    "customer_phoneno": "09795832170",
    "user_name": "Zin Phyo Ko",
    "app_customer_type": "AGENT",
    "password": "$2y$10$6XJ3sTQuWv.u8XzEE9HeYO0V8kU0a0b.aKads0AJKTJZbziE8UEzu",
    "device_token": null,
    "profile_photo": "/uploads/profile/user.jpg",
    "risk_seqNo": null,
    "risk_name": null,
    "policy_number": null,
    "is_disabled": 0,
    "last_logined_at": "",
    "disabled_from": null,
    "created_at": "2024-05-17T07:34:55.000000Z",
    "updated_at": "2024-05-17T07:34:55.000000Z",
    "agent_info": {
        "id": 8,
        "customer_id": 623,
        "agent_name": "Zin Phyo Ko",
        "license_no": "90232",
        "agent_type": "AGSd",
        "expired_date": "20320",
        "email": "jlwejaw@mail.com",
        "achievement": "Gasf",
        "title": "asdas",
        "created_at": "2024-05-17T07:34:55.000000Z",
        "updated_at": "2024-05-17T07:34:55.000000Z"
    }
},
*/