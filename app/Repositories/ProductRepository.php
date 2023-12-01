<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductRepository
{
    static function getAll()
    {
        return Product::query()->orderBy('sort')->get();
    }
    static function store(array $input)
    {
        return Product::create($input);
    }
    static function getById($id)
    {
        return Product::find($id);
    }
    static function get($id)
    {
        return Product::find($id);
    }
    static function destroyWithRelateTable($id)
    {
        $product = Product::find($id);
        $product->properties()->delete();
        $product->faqs()->delete();
        return $product->delete();
    }
    static function getWithPropertyAndFAQ()
    {
        $value = Cache::remember('getWithPropertyAndFAQ', null, function () {
            return Product::with('properties.type')->with('faqs')->where('status', 1)->orderBy('sort')->get();
        });
        return $value;
    }

    static function changeStatus($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        if (!$product)
            return false;
        return $product->update(['status' => !$product->status]);
    }
    static function update($product_id, $input)
    {
        return Product::find($product_id)->update($input);
    }


}