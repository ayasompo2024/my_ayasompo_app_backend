<?php
namespace App\Services;
use App\Models\Customer;


class UtilityService
{
    function countTotalCustomer(){
        return Customer::count();
    }

}

