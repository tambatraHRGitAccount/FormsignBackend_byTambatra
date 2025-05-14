<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class SuccessorsDto
{
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('id')]
    public ?int $id = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;

    #[Assert\Choice(choices: ['MR', 'MRS', 'MISS'], message: 'Title must be either MR, MRS, or MISS')]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('title_succ')]
    public ?string $title = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('surname_succ')]
    public ?string $surname = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 100)]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('forename_succ')]
    public ?string $forename = null;

    #[Assert\Length(max: 255)]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('address_succ')]
    public ?string $address = null;

    #[Assert\Length(max: 20)]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('phone1_succ')]
    public ?string $phone1 = null;

    #[Assert\Length(max: 20)]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('phone2_succ')]
    public ?string $phone2 = null;

    #[Assert\Length(max: 20)]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('phone3_succ')]
    public ?string $phone3 = null;

    #[Assert\Length(max: 20)]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('phone4_succ')]
    public ?string $phone4 = null;

    #[Assert\Length(max: 100)]
    #[Assert\Email(message: 'The email address is not valid')]
    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('email_address_1_succ')]
    public ?string $emailAddress1 = null;

    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('contact_remarks_succ')]
    public ?string $contactRemarks = null;

    #[Groups(['successors:read', 'successors:write'])]
    #[SerializedName('is_authorized_succ')]
    public ?bool $isAuthorized = null;
}