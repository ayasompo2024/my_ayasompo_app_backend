<?php

namespace App\Http\Requests\api\app;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MotorClaimcaseRequest extends FormRequest
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
            "driver_name" => ['required'],
            "policy_no" => ['required'],
            "accident_location" => ['required'],
            "accident_date" => ['required'],
            "accident_time" => ['required'],
            "accident_description" => ['required'],
            "accident_damaged_portion" => ['required'],
            "vehicle_no" => ['required'],
            "risk_seq_no" => ['required'],

            "accident_damaged_photos" => ['required'],
            "accident_damaged_photos*" => ['required', 'array', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG'],
            "signature_image" => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG'],

            "customer_code" => ['required'],
            "product_code" => ['required'],
            "class_code" => ['required'],
            "customer_type" => ['required'],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "metadata" => [
                'isSuccess' => false,
                'message' => "Validation Error",
                'statusCode' => 400
            ],
            'errors' => $validator->errors()
        ], 400));
    }
}








