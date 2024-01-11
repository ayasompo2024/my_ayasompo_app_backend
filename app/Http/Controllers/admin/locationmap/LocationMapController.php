<?php

namespace App\Http\Controllers\admin\locationmap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LocationMapService;
use App\Http\Requests\admin\StoreLocationMapRequest;

class LocationMapController extends Controller
{
    public function index(LocationMapService $locationMapService)
    {
        return view('admin.location-map.index', with([
            'location_maps' => $locationMapService->getAll()
        ]));
    }
    public function create(LocationMapService $locationMapService)
    {
        return view('admin.location-map.create')->with([
            'categories' => $locationMapService->getAllCategory()
        ]);
    }
    public function store(StoreLocationMapRequest $request, LocationMapService $locationMapService)
    {
        return $locationMapService->store($request) ?
            redirect('/admin/location-map')->with('success', 'Success') :
            redirect('/admin/location-map')->with('fail', 'Success');
    }
    public function show($id, LocationMapService $locationMapService)
    {
        return view('admin.location-map.edit', with([
            'categories' => $locationMapService->getAllCategory(),
            'location_map' => $locationMapService->getById($id)
        ]));
    }
    public function edit($id, LocationMapService $locationMapService)
    {
        return view('admin.location-map.edit', with([
            'categories' => $locationMapService->getAllCategory(),
            'location_map' => $locationMapService->getById($id)
        ]));
    }
    public function update(Request $request, $id)
    {
        return $request->all();
    }
    public function destroy($id, LocationMapService $locationMapService)
    {
        return $locationMapService->destroy($id) ?
            redirect('/admin/location-map')->with('success', 'Success') :
            redirect('/admin/location-map')->with('fail', 'Success');
    }
}
