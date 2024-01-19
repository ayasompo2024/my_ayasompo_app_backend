<?php
namespace App\Repositories;

use App\Models\DeviceToken;

class DeviceTokenRepository
{
    static function store(array $input)
    {
        return DeviceToken::create($input);
    }
    static function getAll()
    {
        return DeviceToken::all();
    }

    static function getByCustomerId($customerId)
    {
        return DeviceToken::query()->where('customer_id', $customerId)->get();
    }



}