<?php

namespace App\Repositories;

use App\Models\MotorClaimCase;
use App\Models\NonMotorClaimCase;

class ClaimcaseRepository
{
    public static function createMotorCase($input)
    {
        return MotorClaimCase::create($input);
    }

    public static function createNonMotorCase($input)
    {
        return NonMotorClaimCase::create($input);
    }

    public static function getMotorCase($per_page)
    {
        return MotorClaimCase::query()->orderByDesc('id')->paginate($per_page);
    }

    public static function getNonMotorCase($per_page)
    {
        return NonMotorClaimCase::query()->orderByDesc('id')->paginate($per_page);
    }
}
