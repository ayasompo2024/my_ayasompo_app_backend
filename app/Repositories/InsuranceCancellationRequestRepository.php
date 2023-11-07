<?php
namespace App\Repositories;

use App\Models\CoreCustomer;
use App\Models\Customer;
use App\Models\InsuranceCancellationRequest;

class InsuranceCancellationRequestRepository
{
    static function store(array $input)
    {
        return $input;
        return InsuranceCancellationRequest::create($input);
    }

}


