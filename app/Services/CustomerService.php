<?php
namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;



class CustomerService
{
    public function __construct(
        protected CustomerRepository $customer_repository
    ) {
        $this->customer_repository = $customer_repository;
    }

    public function getAll($is_paginate = false)
    {
        return $is_paginate ? Customer::orderBy('created_at', 'desc')->paginate($is_paginate) : Customer::orderBy('created_at', 'desc')->get();
    }

    public function shopOwners()
    {
        return Customer::with('shops:id,name')->get();
    }

    public function getById(int $id)
    {
        return $this->customer_repository->getById($id);
    }

    public function getByEmail(string $email)
    {
        return $this->customer_repository->getByEmail($email);
    }

    public function store(array $input)
    {
        return $this->customer_repository->store($input);
    }

    public function googleLoginCallback($google_account)
    {

        $email = $google_account->email;
        $name = $google_account->name;
        $avatar = $google_account->avatar;

        $user = $this->customer_repository->firstOrNewBaseOnEmail($email, $name, 'Google', $avatar);

        $user->save();
        return $user;
    }


}