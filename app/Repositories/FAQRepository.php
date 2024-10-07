<?php

namespace App\Repositories;

use App\Models\FAQ;

class FAQRepository
{
    public static function getAll()
    {
        return FAQ::all();
    }

    public static function store(array $input)
    {
        return FAQ::create($input);
    }

    public static function delete(int $id)
    {
        return FAQ::destroy($id);
    }

    public static function getByProductId(int $product_id)
    {
        return FAQ::query()->where('product_id', $product_id)->get();
    }

    public static function getById(int $id)
    {
        return FAQ::find($id);
    }

    public static function update(int $id, $input)
    {
        return FAQ::find($id)->update($input);
    }
}
