<?php
namespace App\Services;

use App\Repositories\FAQRepository;

class FAQService
{

    function getAll()
    {
        // return FAQRepository::getAll();
    }

    public function store($request)
    {
        // $input = $request->only("name");
        // return FAQRepository::store($input);
    }

    public function getById($id)
    {
        return FAQRepository::getById($id);
    }

    public function destroyById($id)
    {
        return FAQRepository::delete($id);
    }

    public function update($id, $request)
    {
        $input = $request->only("title", "desc", "title_mm", "desc_mm");
        return FAQRepository::update($id, $input);

    }
}