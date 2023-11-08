<?php

namespace App\Http\Requests\api\app;

use App\Traits\api\ApiResponser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreInquiryCaseRequest extends FormRequest
{
    use ApiResponser;
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


            'reason' => ['nullable'],
            "effective_date" => ['nullable'],
            "bank_account_number" => ['nullable'],
            "bank_name" => ['nullable'],
            "other_bank_name" => ['nullable'],
            "other_bank_address" => ['nullable'],

            "inquiry_type" => ['required'],
            "customer_type" => ['required'],
            'title' => ['required'],
            'ayasompo_vehicleno' => ['nullable'],
            "ayasompo_customercode" => ['required'],
            "ayasompo_policyno" => ['required'],
            "ayasompo_productcode" => ['required'],
            "ayasompo_classcode" => ['required'],
            "ayasompo_risksequenceno" => ['required'],
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


















