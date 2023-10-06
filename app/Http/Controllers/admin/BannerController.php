<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    use FileUpload;
    public function index()
    {
        $banners = BannerRepository::getAll();
        return view('admin.banner.index', compact("banners"));
    }


    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate(["image" => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128']]);
        $input = $request->only('titel', 'desc', 'link', 'sort');
        $upload_path = $this->uploadFile($request->image, '/uploads/banner/', 'aya_sompo');
        $input["image"] = $upload_path;
        return BannerRepository::store($input) ?
            redirect('/admin/banner')->with('success', 'Success') :
            redirect('/admin/banner')->with('fail', 'Success');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}