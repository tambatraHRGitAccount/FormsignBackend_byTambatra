<?php

namespace App\Enum;

enum Liability: string
{
    case NotAtFault = 'NOT AT FAULT';
    case AtFault = 'AT FAULT';
}