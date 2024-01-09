<?php
namespace App\Services;

use App\Repositories\ClaimcaseRepository;

class ClaimcaseService
{
    function index($per_page)
    {
        return [
            'motor' => ClaimcaseRepository::getMotorCase($per_page),
            'nonMotor' => ClaimcaseRepository::getNonMotorCase($per_page),
        ];
    }
    function motorCase($per_page)
    {
         ClaimcaseRepository::getMotorCase($per_page);
    }
    function nonMotorCase($per_page)
    {
        return ClaimcaseRepository::getNonMotorCase($per_page);
    }
}




