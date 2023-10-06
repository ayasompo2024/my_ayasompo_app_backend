<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\PropertyTypeRepository;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{

    public function index()
    {
        $type = PropertyTypeRepository::getAll();
        return view("admin.property_type.index", compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => "required"]);
        $input = $request->only("name");
        return PropertyTypeRepository::store($input) ?
            redirect("admin/property-type")->with('sucess', 'Success') :
            redirect('admin/property-type')->with('fail', 'fail');
    }
    public function edit($id)
    {
        return $id;
    }

    public function update(Request $request, $id)
    {
        return $request->all();
    }
    public function destroy($id)
    {
        return PropertyTypeRepository::delete($id) ?
            redirect("admin/property-type")->with('sucess', 'Success') :
            redirect('admin/property-type')->with('fail', 'fail');
    }
}