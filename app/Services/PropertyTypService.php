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
        $input = $request->only("name");
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
            "name" => $request->name
        ];
        return PropertyTypeRepository::updateById($id, $input);

    }
}