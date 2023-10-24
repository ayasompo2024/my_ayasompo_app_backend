<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function isIncludeFields($request, $fields_string)
    {
        $fields_array = explode(",", $fields_string);
        $field_and_rule = array();
        foreach ($fields_array as $field) {
            $field_and_rule[$field] = "required";
        }
        return Validator::make($request->all(), $field_and_rule);
    }
}