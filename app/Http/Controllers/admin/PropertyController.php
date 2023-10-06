<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\ProductPropertyRepository;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function new($product_id, $property_type_id)
    {
        return view("admin.product_property.create", compact('product_id', 'property_type_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "nullable",
            "desc" => "required",
            "product_id" => "required|integer|min:1",
            "property_type_id" => "required|integer|min:1",
        ]);
        $input = $request->only("title", "desc", "product_id", "property_type_id");
        $status = ProductPropertyRepository::store($input);
        return $status ? redirect()->back()->with('success', 'Success') : redirect()->back()->with('fail', 'fail');
    }

    public function show($id)
    {
        return $id;
        
    }
    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        return ProductPropertyRepository::destroyById($id) ?
            redirect()->back()->with('success', 'Success') :
            redirect()->back()->with('fail', 'fail');
    }
}