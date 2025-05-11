<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class AppointmentDto
{
    #[Groups(['appointment:read'])]
    public ?int $id = null;

    #[Assert\NotBlank(groups: ['appointment:write'])]
    #[Assert\Regex(
        pattern: '/^\d{4}-\d{2}-\d{2}$/',
        message: 'dateRdv must be in YYYY-MM-DD format',
        groups: ['appointment:write']
    )]
    #[Groups(['appointment:read', 'appointment:write'])]
    #[SerializedName('dateRdv')]
    public ?string $dateRdv = null;

    #[Groups(['appointment:read', 'appointment:write'])]
    #[SerializedName('comment')]
    public ?string $comment = null;

    #[Assert\NotBlank(groups: ['appointment:write'])]
    #[Assert\Choice(
        choices: [
            'Incoming Call', 'Outgoing Call', 'Mail', 'Swan Correspondance', 'WhatsApp message'
        ],
        groups: ['appointment:write']
    )]
    #[Groups(['appointment:read', 'appointment:write'])]
    #[SerializedName('requestOrigin')]
    public ?string $requestOrigin = null;

    #[Assert\NotBlank(groups: ['appointment:write'])]
    #[Assert\Choice(
        choices: [
            'Request for Information', 'Endorsement', 'Removal of Lease', 'Documents Missing',
            'Renewal Follow-Up', 'Policy Nego', 'Cancellation', 'Request for Early Renewal',
            'Cover Letter Corporate'
        ],
        groups: ['appointment:write']
    )]
    #[Groups(['appointment:read', 'appointment:write'])]
    #[SerializedName('operationType')]
    public ?string $operationType = null;

    #[Assert\NotBlank(groups: ['appointment:write'])]
    #[Assert\Choice(
        choices: [
            'Awaiting Company Revert', 'Awaiting Customer Revert', 'In Process', 'Pending', 'Processed'
        ],
        groups: ['appointment:write']
    )]
    #[Groups(['appointment:read', 'appointment:write'])]
    #[SerializedName('followUpStatus')]
    public ?string $followUpStatus = null;

    #[Assert\NotBlank(groups: ['appointment:write'])]
    #[Groups(['appointment:write'])]
    #[SerializedName('client')]
    public ?int $clientId = null;

    #[Groups(['appointment:read'])]
    #[SerializedName('createdAt')]
    public ?string $createdAt = null;

    #[Groups(['appointment:read'])]
    #[SerializedName('updatedAt')]
    public ?string $updatedAt = null;
}