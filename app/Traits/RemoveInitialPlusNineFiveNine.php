<?php

namespace App\Traits;


trait RemoveInitialPlusNineFiveNine
{
    function removeInitialPlusNineFiveNine($phoneNumber)
    {
        $prefixToRemove = '+95';
        if (strpos($phoneNumber, $prefixToRemove) === 0) {
            return '0' . substr($phoneNumber, strlen($prefixToRemove));
        }
        return $phoneNumber;
    }
}