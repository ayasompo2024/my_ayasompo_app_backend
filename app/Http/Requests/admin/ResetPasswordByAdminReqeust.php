<?php

namespace App\Http\Requests\admin;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordByAdminReqeust extends FormRequest
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
        $customerIds = implode(',', Customer::all()->pluck('id')->toArray());

        return [
            'customer_id' => "required | in:$customerIds",
        ];
    }
}
