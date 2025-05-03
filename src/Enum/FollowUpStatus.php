<?php

namespace App\Enum;

enum FollowUpStatus: string
{
    case AwaitingCompanyRevert = 'Awaiting Company Revert';
    case AwaitingCustomerRevert = 'Awaiting Customer Revert';
    case InProcess = 'In Process';
    case Pending = 'Pending';
    case Processed = 'Processed';
}