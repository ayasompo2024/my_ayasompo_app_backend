<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(BannerService $bannerService)
    {
        $banners = $bannerService->getAll();

        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request, BannerService $bannerService)
    {
        $request->validate(['image' => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128']]);

        return $bannerService->store($request) ?
            redirect('/admin/banner')->with('success', 'Success') :
            redirect('/admin/banner')->with('fail', 'Success');
    }

    public function destroy($id, BannerService $bannerService)
    {
        return $bannerService->deleteById($id) ?
            redirect('/admin/banner')->with('success', 'Success') :
            redirect('/admin/banner')->with('fail', 'Success');
    }

    public function changeStatus($id, BannerService $bannerService)
    {
        return $bannerService->changeStatus($id) ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }

    public function show($id, BannerService $bannerService)
    {
        return $bannerService->getById($id);
    }

    public function edit($id, BannerService $bannerService)
    {
        return view('admin.banner.edit')->with('banner', $bannerService->getById($id));
    }

    public function update(Request $request, $id, BannerService $bannerService)
    {
        $request->validate(['image' => ['nullable', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128']]);

        return $bannerService->update($id, $request) ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }
}
