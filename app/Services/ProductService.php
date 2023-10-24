<?php
namespace App\Services;

use App\Repositories\FAQRepository;
use App\Repositories\ProductPropertyRepository;
use App\Repositories\ProductRepository;
use App\Traits\FileUpload;



class ProductService
{
    use FileUpload;
    function changeStatus($id)
    {
        return ProductRepository::changeStatus($id);
    }
    function getAll()
    {
        return ProductRepository::getAll();
    }
    function store($request)
    {
        $input = $request->only("name", "title", "product_type", "brief_description");
        $upload_path = $this->uploadFile($request->thumbnail, '/uploads/thumbnail/', 'aya_sompo');
        $input["thumbnail"] = $upload_path;
        return ProductRepository::store($input);
    }
    public function getById($id)
    {
        return ProductRepository::getById($id);
    }

    public function destroyById($id)
    {
        return ProductRepository::destroyWithRelateTable($id);
    }
    public function getFaqByProductId($product_id)
    {
        return FAQRepository::getByProductId($product_id);
    }
    public function getPropertyWithPropertyTypeIdAndProductId($product_id, $property_type_id)
    {
        return ProductPropertyRepository::getByProductIdAndPropertyTypeId($product_id, $property_type_id);
    }

}