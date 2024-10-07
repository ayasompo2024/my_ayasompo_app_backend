<?php

namespace App\Services;

use App\Repositories\RequestFormRepository;

class RequestFormService
{
    public function getWithPaginate($perPage)
    {
        return RequestFormRepository::getWithPaginate($perPage);
    }
}
