<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\PropertyTypService;
use App\Traits\FileUpload;
use App\Traits\SendPushNotification;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use FileUpload,SendPushNotification;

    public function index(ProductService $productService, PropertyTypService $propertyTypService)
    {
        $products = $productService->getAll();
        $property = $propertyTypService->getAll();

        return view('admin.product.index', compact('products', 'property'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request, ProductService $productService)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'product_type' => 'required',
            'brief_description' => 'required',
            'thumbnail' => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128'],
        ]);

        return $productService->store($request) ?
            redirect('admin/product')->with('success', 'Success') :
            redirect('admin/product')->with('fail', 'fail');
    }

    public function show($id, ProductService $productService)
    {
        return view('admin.product.show')->with(['product' => $productService->getById($id)]);
    }

    public function edit($id, ProductService $productService)
    {
        return view('admin.product.edit')->with(['product' => $productService->getById($id)]);
    }

    public function destroy($id, ProductService $productService)
    {
        return $productService->destroyById($id) ?
            redirect()->back()->with('success', 'Success') :
            redirect()->back()->with('fail', 'Fail');
    }

    public function update(Request $request, $id, ProductService $productService)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'product_type' => 'required',
            'brief_description' => 'required',
            // "thumbnail" => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128'],
        ]);

        return $productService->update($id, $request) ?
            redirect()->back()->with('success', 'Success') :
            redirect()->back()->with('fail', 'Fail');
    }

    public function changeStatus($id, ProductService $productService)
    {
        return $productService->changeStatus($id) ?
            back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }

    public function getPropertyByPropertyTypeIdAndProductId($product_id, $property_type_id, ProductService $productService)
    {
        $properties = $productService->getPropertyWithPropertyTypeIdAndProductId($product_id, $property_type_id);

        return view('admin.product_property.index', compact('properties', 'product_id', 'property_type_id'));
    }

    public function getFaqByProductId($product_id, ProductService $productService)
    {
        $faqs = $productService->getFaqByProductId($product_id);

        return view('admin.faq.index', compact('faqs', 'product_id'));
    }

    public function forceUpdateToApp()
    {
        $notification = ['title' => 'Content Update Delivered!', 'body' => null];
        $data = ['title' => 'Product', 'body' => null];
        $this->sendAsbroadcast($notification, $data);

        return back()->with(['success' => 'Successfully!']);
    }
}
