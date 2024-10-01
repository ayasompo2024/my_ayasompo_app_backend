<?php

namespace App\Services\api\app\claimcase;

use App\Repositories\ClaimcaseRepository;

trait StoreClaimCase
{
    private function storeMotorCase($input)
    {
        return ClaimcaseRepository::createMotorCase($input);
    }

    private function storeNonMotorCase($input)
    {
        return ClaimcaseRepository::createNonMotorCase($input);
    }
}
