<?php

namespace App\Http\Controllers\admin\locationmap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LocationMapService;

class LocationMapCategoryController extends Controller
{

    public function index(LocationMapService $locationMapService)
    {
        return view('admin.location-map.category.index', with([
            'categories' => $locationMapService->getAllCategory()
        ]));
    }

    public function create()
    {
        return view('admin.location-map.category.create');
    }

    public function store(Request $request, LocationMapService $locationMapService)
    {
        $request->validate([
            "name" => ['required'],
            "image" => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128']
        ]);
        return $locationMapService->storeCategory($request) ?
            redirect('/admin/location-map-category')->with('success', 'Success') :
            redirect('/admin/location-map-category')->with('fail', 'Success');
    }

    public function show($id, LocationMapService $locationMapService)
    {
        return $locationMapService->getCategoryById($id);
    }

    public function edit($id, LocationMapService $locationMapService)
    {
        return view('admin.location-map.category.edit', with([
            'category' => $locationMapService->getCategoryById($id)
        ]));
    }

    public function update(Request $request, $id, LocationMapService $locationMapService)
    {
        $request->validate(["image" => ['nullable', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128']]);
        return $locationMapService->updateCategory($id, $request) ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }

    public function destroy($id)
    {
        //
    }
}
