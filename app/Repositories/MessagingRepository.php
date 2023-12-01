<?php
namespace App\Repositories;

use App\Models\Log;
use App\Models\Messaging;



class MessagingRepository
{
    static function getWithPaginate($perpage)
    {
        return Messaging::query()->with('customer')->orderByDesc('id')->paginate($perpage);
    }
    static function store($input)
    {
        return Messaging::create($input);
    }

}