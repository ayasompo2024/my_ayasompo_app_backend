<?php

namespace App\Repositories;

use App\Models\CoreCustomer;

class CoreCustomerRepository
{
    public static function store(array $input)
    {
        return CoreCustomer::create($input);
    }
}
