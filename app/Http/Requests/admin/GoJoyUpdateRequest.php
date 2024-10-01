<?php

namespace App\Http\Requests\admin;

use App\Enums\GeneralStatusEnum;
use App\Helpers\Enum;
use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class GoJoyUpdateRequest extends FormRequest
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
        $customerIds = implode(',', array: Customer::all()->pluck('id')->toArray());
        $generalStatus = implode(',', (new Enum(GeneralStatusEnum::class))->values());

        return [
            'customer_id' => "nullable | in: $customerIds",
            'full_name' => 'nullable | string',
            'nrc' => 'nullable | string',
            'dob' => 'nullable | date',
            'mobile_number' => 'nullable | string',
            'email' => 'nullable | string',
            'beneficiary_name' => 'nullable | string',
            'beneficiary_contact' => 'nullable | string',
            'tag_name' => 'nullable | string',
            'status' => "nullable | string | in:$generalStatus",
        ];
    }
}
