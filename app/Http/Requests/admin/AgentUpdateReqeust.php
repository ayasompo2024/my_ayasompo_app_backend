<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AgentUpdateReqeust extends FormRequest
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
            'agent_name' => 'nullable',
            'license_no' => 'nullable',
            'agent_type' => 'nullable',
            'expired_date' => 'nullable | date',
            'email' => 'nullable',
            'achievement' => 'nullable',
            'title' => 'nullable',
        ];
    }
}
