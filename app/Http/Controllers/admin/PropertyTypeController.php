<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\PropertyTypeRepository;
use App\Services\PropertyTypService;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{

    public function index(PropertyTypService $propertyTypService)
    {
        return view("admin.property_type.index")->with('type', $propertyTypService->getAll());
    }

    public function store(Request $request, PropertyTypService $propertyTypService)
    {
        $request->validate(['name' => "required"]);
        return $propertyTypService->store($request) ?
            redirect("admin/property-type")->with('success', 'Success') :
            redirect('admin/property-type')->with('fail', 'fail');
    }
    public function edit($id, PropertyTypService $propertyTypService)
    {
        $property_type = $propertyTypService->getById($id);
        return view("admin.product_property.edit", compact('property_type'));
    }

    public function update(Request $request, $id, PropertyTypService $propertyTypService)
    {
        return $propertyTypService->update($id, $request) ?
            redirect("admin/property-type")->with('success', 'Success') :
            redirect('admin/property-type')->with('fail', 'fail');
    }
    public function destroy($id, PropertyTypService $propertyTypService)
    {
        return back()->with("fail", "Method was commented");
        // return $propertyTypService->destroyById($id) ?
        //     redirect("admin/property-type")->with('success', 'Success') :
        //     redirect('admin/property-type')->with('fail', 'fail');
    }
}