<?php

namespace App\Enum;

enum OperationType: string
{
    case RequestForInformation = 'Request for Information';
    case Endorsement = 'Endorsement';
    case RemovalOfLease = 'Removal of Lease';
    case DocumentsMissing = 'Documents Missing';
    case RenewalFollowUp = 'Renewal Follow-Up';
    case PolicyNego = 'Policy Nego';
    case Cancellation = 'Cancellation';
    case RequestForEarlyRenewal = 'Request for Early Renewal';
    case CoverLetterCorporate = 'Cover Letter Corporate';
}