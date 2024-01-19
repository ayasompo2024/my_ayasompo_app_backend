<?php
namespace App\Repositories;

use App\Models\Log;



class LogRepository
{
    static function getWithPaginate($perpage)
    {
        return Log::query()->orderByDesc('id')->paginate($perpage);
    }

    static function store(array $input)
    {
        return Log::create($input);
    }

    static function getById(int $id)
    {

    }

}