<?php
namespace App\Repositories;

use App\Models\Customer;

class DeviceToken
{
    public function getById(int $id)
    {
        return Customer::find($id);
    }
    public function getByEmail(string $email)
    {
        return Customer::whereEmail($email)->first();
    }
    public function store(array $input)
    {
        return Customer::create($input);
    }
    public function getTokesByid($id)
    {
        
    }

}