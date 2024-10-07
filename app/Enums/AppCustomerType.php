<?php

namespace App\Enums;

enum AppCustomerType: string
{
    case INDIVIDUAL = 'INDIVIDUAL';
    case GROUP = 'GROUP';
    case CORPORATE = 'CORPORATE';
}
