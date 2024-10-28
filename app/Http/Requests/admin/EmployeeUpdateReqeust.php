<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateReqeust extends FormRequest
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
            'customer_id' => 'nullable',
            'code' => 'nullable',
            'designation' => 'nullable',
            'department' => 'nullable',
            'email' => 'nullable',
            'office_phone' => 'nullable',
            'office_address' => 'nullable',
        ];
    }
}
