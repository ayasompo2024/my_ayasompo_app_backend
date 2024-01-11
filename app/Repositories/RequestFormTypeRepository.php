<?php
namespace App\Repositories;

use App\Models\RequestFormType;


class RequestFormTypeRepository
{
    static function store($input)
    {
        return RequestFormType::create($input);
    }
    static function getAll()
    {
        return RequestFormType::all();
    }
    static function getByID($id)
    {
        return RequestFormType::find($id);
    }
    static function update($id, $input)
    {
        return RequestFormType::find($id)->update($input);
    }
}




