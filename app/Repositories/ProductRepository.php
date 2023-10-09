<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{

    static function getAll()
    {
        return Product::all();
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
        return [
            Product::destroy($id),
            ProductPropertyRepository::destroyByProductId($id)
        ];
    }
    static function getWithPropertyAndFAQ()
    {
        return Product::with('properties.type')->with('faqs')->get();
    }
    
    static function changeStatus($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        if (!$product)
            return false;
        
        return $product->update(['status' => !$product->status]);
    }
    
    
}