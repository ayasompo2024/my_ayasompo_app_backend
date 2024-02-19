<?php
namespace App\Services;

use App\Repositories\ProductPropertyRepository;


class ProductPropertyService
{
    function store($request)
    {
        $input = $request->all();
        return ProductPropertyRepository::store($input);
    }
    function getById($id)
    {
        return ProductPropertyRepository::getById($id);
    }

    function update($id, $request)
    {
        $input = $request->only("title", "desc","title_mm","desc_mm");
        return ProductPropertyRepository::update($id,$input);
    }
}