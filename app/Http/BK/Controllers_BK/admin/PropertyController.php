<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\ProductPropertyRepository;
use App\Services\ProductPropertyService;
use App\Services\PropertyTypService;
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
        $input = $request->only("title", "desc", "title_mm", "desc_mm", "product_id", "property_type_id");
        $status = ProductPropertyRepository::store($input);
        return $status ? redirect()->back()->with('success', 'Success') : redirect()->back()->with('fail', 'fail');
    }

    public function show($id)
    {
        return $id;

        // getById
    }
    public function edit($id, ProductPropertyService $productPropertyService)
    {
        return view("admin.product_property.edit")->with("product_property", $productPropertyService->getById($id));
    }

    public function update(Request $request, $id, ProductPropertyService $productPropertyService)
    {
        $request->validate([
            "title" => "nullable",
            "desc" => "required",
        ]);
        $status = $productPropertyService->update($id, $request);
        return $status ? redirect()->back()->with('success', 'Success') : redirect()->back()->with('fail', 'fail');
    }

    public function destroy($id)
    {
        return ProductPropertyRepository::destroyById($id) ?
            redirect()->back()->with('success', 'Success') :
            redirect()->back()->with('fail', 'fail');
    }
}