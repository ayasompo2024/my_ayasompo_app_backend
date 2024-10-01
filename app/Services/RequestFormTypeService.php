<?php

namespace App\Services;

use App\Repositories\RequestFormTypeRepository;

class RequestFormTypeService
{
    public function store($request)
    {
        return RequestFormTypeRepository::store($request->only('type'));
    }

    public function getAll()
    {
        return RequestFormTypeRepository::getAll();
    }

    public function getByID($id)
    {
        return RequestFormTypeRepository::getByID($id);
    }
}
