<?php

namespace App\Repositories;

use App\Models\RequestFormType;

class RequestFormTypeRepository
{
    public static function store($input)
    {
        return RequestFormType::create($input);
    }

    public static function getAll()
    {
        return RequestFormType::all();
    }

    public static function getByID($id)
    {
        return RequestFormType::find($id);
    }

    public static function update($id, $input)
    {
        return RequestFormType::find($id)->update($input);
    }
}
