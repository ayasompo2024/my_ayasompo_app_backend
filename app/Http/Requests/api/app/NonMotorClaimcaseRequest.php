<?php

namespace App\Http\Requests\api\app;

use Illuminate\Foundation\Http\FormRequest;

class NonMotorClaimcaseRequest extends FormRequest
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
            "contact_fullname" => ['required'],
            "contact_telephone" => ['required'],
            "accident_date" => ['required'],
            "accident_time" => ['required'],
            "accident_description" => ['required'],

            "policy_or_risk_name" => ['required'],

            "nrc_no" => ['required'],
            "passport_no" => ['nullable'],

            "product_type" => ['required'],

            "accident_damaged_photos" => ['required'],
            "accident_damaged_photos*" => ['required', 'array', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG'],
            "signature_image" => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG'],
        ];
    }
}

