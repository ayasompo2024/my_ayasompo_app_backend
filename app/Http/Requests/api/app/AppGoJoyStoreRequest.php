<?php

namespace App\Http\Requests\api\app;

use Illuminate\Foundation\Http\FormRequest;

class AppGoJoyStoreRequest extends FormRequest
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
            'full_name' => 'required | string',
            'nrc' => 'required | string',
            'dob' => 'required | date',
            'mobile_number' => 'required | string',
            'email' => 'required | string',
            'beneficiary_name' => 'required | string',
            'beneficiary_contact' => 'required | string',
            'tag_name' => 'required | string',
        ];
    }
}
