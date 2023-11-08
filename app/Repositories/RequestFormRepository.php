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
        return RequestForm::query()->orderByDesc("id")->paginate($perPage);
    }

}


