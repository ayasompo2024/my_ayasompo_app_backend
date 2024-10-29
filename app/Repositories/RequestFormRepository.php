<?php

namespace App\Repositories;

use App\Models\RequestForm;

class RequestFormRepository
{
    public static function store(array $input)
    {
        RequestForm::create($input);
    }

    public static function getWithPaginate(int $perPage)
    {
        return RequestForm::query()->with('customer')->orderByDesc('created_at')->paginate($perPage);
    }

    public static function getByAppCustomerID($app_customer_id)
    {
        return RequestForm::where('app_customer_id', $app_customer_id)->get();
    }

    public static function updateStatusByCaseID($case_id, $newData)
    {
        // $row = RequestForm::where("ayasompo_caseid", $case_id)->first();
        $row = RequestForm::where('incidentid', $case_id)->first();
        if ($row) {
            return $row->update($newData);
        }
    }
}
