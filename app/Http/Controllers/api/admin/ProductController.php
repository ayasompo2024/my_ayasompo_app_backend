<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;

use App\Repositories\ProductRepository;
use App\Repositories\PropertyTypeRepository;
use App\Services\ProductService;
use App\Traits\api\ApiResponser;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    use FileUpload, ApiResponser;

    public function getAll()
    {
        $info = [
            $products = ProductRepository::getAll(),
            $property = PropertyTypeRepository::getAll()
        ];
        return $this->successResponse("Products and Properties", $info, 200);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "title" => "required",
            "product_type" => "required",
            "brief_description" => "nullable",
            "thumbnail" => ['required', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG', 'max:5128'],
        ]);
        if ($validator->fails())
            return $this->respondValidationErrors("Validation Error", $validator->errors(), 400);

        $input = $request->only("name", "title", "product_type", "brief_description");
        $upload_path = $this->uploadFile($request->thumbnail, '/uploads/thumbnail/', 'aya_sompo');
        $input["thumbnail"] = $upload_path;
        $status = ProductRepository::store($input);
        return $status ?
            $this->successResponse("Product Created !", $status, 200) :
            $this->errorResponse("Product Create Fail !", 500);
    }

    function changeStatus($id, ProductService $productService)
    {
        $status = $productService->changeStatus($id);
        return $status ?
            $this->successResponse(" Updated !", $status, 200) :
            $this->errorResponse("Updated Fail !", 500);
    }
    function delete($id, ProductService $productService)
    {
        $status = $productService->destroyById($id);
        return $status ?
            $this->successResponse(" Succss !", $status, 200) :
            $this->errorResponse("Fail !", 500);
    }
}
