<?php

namespace App\Services;

use App\Repositories\ClaimcaseRepository;

class ClaimcaseService
{
    public function index($per_page)
    {
        return [
            'motor' => ClaimcaseRepository::getMotorCase($per_page),
            'nonMotor' => ClaimcaseRepository::getNonMotorCase($per_page),
        ];
    }

    public function motorCase($per_page)
    {
        return ClaimcaseRepository::getMotorCase($per_page);
    }

    public function nonMotorCase($per_page)
    {
        return ClaimcaseRepository::getNonMotorCase($per_page);
    }
}
