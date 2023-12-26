<?php
namespace App\Repositories;

use App\Models\CoreCustomer;
use App\Models\Customer;

class CoreCustomerRepository
{
    static function store(array $input)
    {
        return CoreCustomer::create($input);
    }

}


