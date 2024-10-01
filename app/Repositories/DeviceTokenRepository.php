<?php

namespace App\Repositories;

use App\Models\DeviceToken;

class DeviceTokenRepository
{
    public static function store(array $input)
    {
        return DeviceToken::create($input);
    }

    public static function getAll()
    {
        return DeviceToken::all();
    }

    public static function getByCustomerId($customerId)
    {
        return DeviceToken::query()->where('customer_id', $customerId)->get();
    }
}
