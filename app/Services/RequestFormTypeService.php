<?php
namespace App\Services;

use App\Repositories\RequestFormTypeRepository;


class RequestFormTypeService
{

    function store($request)
    {
        return RequestFormTypeRepository::store($request->only("type"));
    }
    function getAll()
    {
        return RequestFormTypeRepository::getAll();
    }
    function getByID($id)
    {
        return RequestFormTypeRepository::getByID($id);
    }
}


