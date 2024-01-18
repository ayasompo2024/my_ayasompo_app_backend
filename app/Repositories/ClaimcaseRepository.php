<?php
namespace App\Repositories;

use App\Models\MotorClaimCase;
use App\Models\NonMotorClaimCase;


class ClaimcaseRepository
{

    static function createMotorCase($input)
    {
        return MotorClaimCase::create($input);
    }

    static function createNonMotorCase($input)
    {
        return NonMotorClaimCase::create($input);
    }

    static function getMotorCase($per_page)
    {
        return MotorClaimCase::query()->orderByDesc("id")->paginate($per_page);
    }

    static function getNonMotorCase($per_page)
    {
        return NonMotorClaimCase::query()->orderByDesc("id")->paginate($per_page);
    }

    
}


