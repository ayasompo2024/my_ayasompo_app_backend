<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CoreCustomerUpdateReqeust extends FormRequest
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
        return [
            'app_customer_id' => 'nullable',
            'customer_code' => 'nullable',
            'customer_type' => 'nullable',
            'customer_name' => 'nullable',
            'customer_phoneno' => 'nullable',
            'customer_nrc' => 'nullable',
            'email' => 'nullable',
            'address' => 'nullable',
        ];
    }
}
