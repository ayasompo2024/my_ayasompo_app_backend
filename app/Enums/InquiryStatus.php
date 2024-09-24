<?php

namespace App\Enums;

enum InquiryStatus: string
{
    case IN_PROGRESS = 'In Progress';
    case ON_HOLD = 'On Hold';
    case WAITING_FOR_DETAILS = 'Waiting For Details';
    case RESEARCHING = 'Researching';
}
