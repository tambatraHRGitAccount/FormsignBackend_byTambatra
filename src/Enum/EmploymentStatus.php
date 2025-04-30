<?php

namespace App\Enum;

enum EmploymentStatus: string
{
    case EMPLOYED = 'employed';
    case RETIRED = 'retired';
    case SELF_EMPLOYED = 'self-employed';
}