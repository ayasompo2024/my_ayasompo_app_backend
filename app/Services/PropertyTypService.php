<?php
namespace App\Services;

use App\Repositories\PropertyTypeRepository;



class PropertyTypService
{

    function getAll()
    {
        return PropertyTypeRepository::getAll();
    }

    public function store($request)
    {
        $input = $request->only("name",'name_mm');
        return PropertyTypeRepository::store($input);
    }

    public function getById($id)
    {
        return PropertyTypeRepository::getById($id);
    }

    public function destroyById($id)
    {
        return PropertyTypeRepository::delete($id);
    }

    public function update($id, $request)
    {
        $input = [
            "name" => $request->name,
            'name_mm' => $request->name_mm
        ];
        return PropertyTypeRepository::updateById($id, $input);

    }
}