<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\FAQRepository;
use App\Repositories\ProductPropertyRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PropertyTypeRepository;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    use FileUpload;

    public function index()
    {
        // $token = Cache::get('token');
        // return $token;
        $products = ProductRepository::getAll();
        $property = PropertyTypeRepository::getAll();
        return view('admin.product.index', compact("products", "property"));
    }

    public function create()
    {
        return view('admin.product.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "title" => "required",
            "product_type" => "required",
            "brief_description" => "nullable",
            "thumbnail" => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128'],
        ]);
        $input = $request->only("name", "title", "product_type", "brief_description");
        $upload_path = $this->uploadFile($request->thumbnail, '/uploads/thumbnail/', 'aya_sompo');
        $input["thumbnail"] = $upload_path;
        $status = ProductRepository::store($input);
        return $status ? redirect("admin/product")->with('sucess', 'Success') : redirect('admin/product')->with('fail', 'fail');
    }


    public function show($id)
    {
        $product = ProductRepository::getById($id);
        return view('admin.product.show', compact('product'));
    }

    public function edit($id)
    {
        return view('admin.product.edit')->with(['product'=>ProductRepository::getById($id)]);
    }

    public function update(Request $request, $id)
    {
        return $id;
    }

    public function destroy($id)
    {
        ProductRepository::destroyWithRelateTable($id);
        return redirect()->back()->with('success', 'Success');
    }

    function getPropertyByPropertyTypeIdAndProductId($product_id, $property_type_id)
    {
        $properties = ProductPropertyRepository::getByProductIdAndPropertyTypeId($product_id, $property_type_id);
        return view('admin.product_property.index', compact('properties', 'product_id', 'property_type_id'));
    }

    function getFaqByProductId($product_id)
    {
        $faqs = FAQRepository::getByProductId($product_id);
        return view('admin.faq.index', compact('faqs', 'product_id'));
    }

    function changeStatus($id)
    {
        return ProductRepository::changeStatus($id) ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }
}
