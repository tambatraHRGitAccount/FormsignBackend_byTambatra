<?php

namespace App\Enum;

enum DocumentType: string
{
    case EIC = 'E.I.C.';
    case APPLICATION_LETTER = 'App. Letter';
    case KYC_LETTER = 'KYC Letter';
    case DIRECTOR_LETTER = 'Dir. Letter';
    case AUTHORIZATION_LETTER = 'Auth. Letter';
    case ID_PASSPORT = 'ID/PASSPORT';
    case DRIVING_LICENSE = 'DRIVING LICENSE';
    case CUSTOMER_DUE_DILIGENCE = 'CUSTOMER DUE DILIGENCE';
    case PRIVATE_NOTICE = 'PRIVATE NOTICE';
    case PROOF_OF_ADDRESS = 'PROOF OF ADDRESS';
    case BRN = 'BRN';
}
