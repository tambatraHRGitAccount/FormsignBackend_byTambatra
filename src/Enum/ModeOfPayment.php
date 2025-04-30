<?php

namespace App\Enum;

enum ModeOfPayment: string
{
    case CASH_SALE = 'CASH_SALE';
    case CREDIT_SALE = 'CREDIT_SALE';
}