<?php

namespace App\Enums;

enum NotiFor: string
{
    case PROMOTION = 'Promotions';
    case TRANSACTION = 'Transactions';
    case SYSTEM = 'System';
}
