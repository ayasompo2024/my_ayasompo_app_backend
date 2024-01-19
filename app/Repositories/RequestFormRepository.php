<?php
namespace App\Repositories;

use App\Models\RequestForm;


class RequestFormRepository
{
    static function store(array $input)
    {
        RequestForm::create($input);
    }
    static function getWithPaginate(int $perPage)
    {
        return RequestForm::query()->with('customer')->orderByDesc("id")->paginate($perPage);
    }
    static function getByAppCustomerID($app_customer_id)
    {
        return RequestForm::where("app_customer_id", $app_customer_id)->get();
    }
    static function updateStatusByCaseID($case_id,$newData)
    {   
        $row = RequestForm::where("ayasompo_caseid", $case_id)->first();
        $row->update($newData);
    }
}


