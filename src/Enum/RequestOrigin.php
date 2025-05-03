<?php

namespace App\Enum;

enum RequestOrigin: string
{
    case IncomingCall = 'Incoming Call';
    case OutgoingCall = 'Outgoing Call';
    case Mail = 'Mail';
    case SwanCorrespondance = 'Swan Correspondance';
    case WhatsAppMessage = 'WhatsApp message';
}