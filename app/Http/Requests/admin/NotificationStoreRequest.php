<?php

namespace App\Http\Requests\admin;

use App\Enums\MessagingType;
use App\Enums\NotiFor;
use App\Helpers\Enum;
use Illuminate\Foundation\Http\FormRequest;

class NotificationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $messageType = implode(',', (new Enum(MessagingType::class))->values());
        $notiForType = implode(',', (new Enum(NotiFor::class))->values());

        return [
            'title' => 'required | string',
            'message' => 'required | string',
            'type' => "required | string | in:$messageType",
            'description' => 'nullable | string',
            'image_url' => 'nullable | file',
            'noti_for' => "required | string | in:$notiForType",
            'customers' => 'required | string',
        ];
    }
}
