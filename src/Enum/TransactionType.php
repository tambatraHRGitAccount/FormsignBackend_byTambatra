<?php

namespace App\Enum;

enum TransactionType: string
{
    case NEW = 'NEW';
    case RENEW = 'RENEW';
    case ENDORSEMENT = 'ENDORSEMENT';
    case CANCELLATION = 'CANCELLATION';
    case ADJUSTEMENT = 'ADJUSTEMENT';
    case NO_RENEWAL = 'NO_RENEWAL';
}