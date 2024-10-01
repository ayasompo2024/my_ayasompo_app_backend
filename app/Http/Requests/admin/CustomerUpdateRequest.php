<?php

namespace App\Http\Requests\admin;

use App\Enums\AppCustomerType;
use App\Helpers\Enum;
use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
        $userId = implode(',', array: Customer::all()->pluck('id')->toArray());
        $appCustomerType = implode(',', (new Enum(AppCustomerType::class))->values());

        return [
            'is_disabled' => 'nullable | numeric',
            'profile_photo' => 'nullable | file',
            'user_id' => "nullable | in:$userId",
            'customer_code' => 'nullable | string',
            'customer_phoneno' => 'nullable | string',
            'user_name' => 'nullable | string',
            'app_customer_type' => "nullable | string | in:$appCustomerType",
            'risk_seqNo' => 'nullable | string',
            'risk_name' => 'nullable | string',
            'policy_number' => 'nullable | string',
            'disabled_from' => 'nullable',
        ];
    }
}
