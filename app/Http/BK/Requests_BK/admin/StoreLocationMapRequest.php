<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreLocationMapRequest extends FormRequest
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
            "location_map_category_id" => ['required'],
            "image" => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128'],
            "name" => ['required'],
            "phone" => ['required'],
            "open_hour" => ['required'],
            "close_hour" => ['required'],
            "open_days" => ['required', 'array'],
            "address" => ['required'],
            "latitude_longitude" => ['required'],
            "google_map" => ['nullable'],
        ];
    }

}








