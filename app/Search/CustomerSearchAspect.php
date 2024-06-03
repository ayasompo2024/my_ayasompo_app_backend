<?php

namespace App\Search;

use Spatie\Searchable\SearchAspect;
use App\Models\Customer;

class CustomerSearchAspect extends SearchAspect
{
    public static string $name = 'customers';

    public function getResults(string $term): \Illuminate\Support\Collection
    {
        return Customer::query()
            ->where('customer_phoneno', 'LIKE', "%{$term}%")
            ->orWhere('customer_code', 'LIKE', "%{$term}%")
            ->orWhere('user_name', 'LIKE', "%{$term}%")
            ->orWhere('risk_seqNo', 'LIKE', "%{$term}%")
            ->orWhere('risk_name', 'LIKE', "%{$term}%")
            ->orWhere('policy_number', 'LIKE', "%{$term}%")
            ->get();
    }
}
