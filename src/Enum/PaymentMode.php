<?php

namespace App\Enum;

enum PaymentMode: string
{
    case IB = 'IB';
    case Cash = 'Cash';
    case Cheque = 'Cheque';
    case Card = 'Card';
}