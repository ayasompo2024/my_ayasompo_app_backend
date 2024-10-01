<?php

namespace App\Services;

use App\Repositories\ProductPropertyRepository;

class ProductPropertyService
{
    public function store($request)
    {
        $input = $request->all();

        return ProductPropertyRepository::store($input);
    }

    public function getById($id)
    {
        return ProductPropertyRepository::getById($id);
    }

    public function update($id, $request)
    {
        $input = $request->only('title', 'desc', 'title_mm', 'desc_mm');

        return ProductPropertyRepository::update($id, $input);
    }
}
