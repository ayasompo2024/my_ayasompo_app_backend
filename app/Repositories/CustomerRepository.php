<?php
namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{

    static function getWithPaginate($per_page)
    {
        return Customer::query()->with('core')->orderByDesc('id')->paginate($per_page);
    }

    static function store(array $input)
    {
        return Customer::create($input);
    }
    static function getById(int $id)
    {
        return Customer::find($id);
    }
    static function getByPhone($phone)
    {
        return Customer::query()->whereCustomer_phoneno($phone)->first();
    }

    static function getAllByPhone($phone)
    {
        return Customer::query()->select('id', 'customer_code', 'customer_phoneno', 'user_name', 'app_customer_type')->whereCustomer_phoneno($phone)->get();
    }
    static function getAllCustomerByPhone($phone)
    {
        return Customer::query()->where("customer_phoneno", $phone)->paginate(30);
    }

}

