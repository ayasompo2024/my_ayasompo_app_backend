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
    function motorCase($request)
    {
        return ClaimcaseRepository::getMotorCase(30);
    }

    function nonMotorCase($request)
    {
        return ClaimcaseRepository::getNonMotorCase(30);
    }
}




