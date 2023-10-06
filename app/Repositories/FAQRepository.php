<?php
namespace App\Repositories;

use App\Models\FAQ;


class FAQRepository
{
    static function getAll()
    {
        return FAQ::all();
    }

    static function store(array $input)
    {
        return FAQ::create($input);
    }

    static function delete(int $id)
    {
        return FAQ::destroy($id);
    }
    static function getByProductId(int $product_id)
    {
        return FAQ::query()->where("product_id", $product_id)->get();
    }


}