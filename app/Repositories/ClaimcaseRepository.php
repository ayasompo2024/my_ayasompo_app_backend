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


}


