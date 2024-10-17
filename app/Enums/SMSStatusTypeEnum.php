<?php

namespace App\Enums;

enum SMSStatusTypeEnum: string
{
    case SUCCESS = 'SUCCESS';
    case PENDING = 'PENDING';
    case FAIL = 'FAIL';
    case EXPIRED = 'EXPIRED';
}
