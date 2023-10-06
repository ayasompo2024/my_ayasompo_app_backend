<?php
namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
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
    public function firstOrNewBaseOnEmail($email, $name, $oauth_provider, $avatar)
    {
        return Customer::firstOrNew(['email' => $email], [
            'name' => $name,
            'oauth_provider' => $oauth_provider,
            'avatar' => $avatar
        ]);
    }
}