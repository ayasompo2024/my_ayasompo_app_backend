<?php
namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{

    static function getWithPaginate($per_page)
    {
        return Customer::query()->with('core')->paginate($per_page);
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

}

