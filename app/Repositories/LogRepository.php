<?php

namespace App\Repositories;

use App\Models\Log;

class LogRepository
{
    public static function getWithPaginate($perpage)
    {
        return Log::query()->orderByDesc('id')->paginate($perpage);
    }

    public static function store(array $input)
    {
        return Log::create($input);
    }

    public static function getById(int $id) {}
}
