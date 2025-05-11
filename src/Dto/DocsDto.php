<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class DocsDto
{
    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[Groups(['docs:read', 'docs:write'])]
    #[SerializedName('CRMClientRef')]
    public ?string $crmClientRef = null;

    #[Assert\Length(max: 255)]
    #[Groups(['docs:read', 'docs:write'])]
    #[SerializedName('CRMFile')]
    public ?string $crmFile = null;

    #[Assert\Length(max: 255)]
    #[Groups(['docs:read', 'docs:write'])]
    #[SerializedName('DocName')]
    public ?string $docName = null;

    #[Assert\Length(max: 255)]
    #[Groups(['docs:read', 'docs:write'])]
    #[SerializedName('DocPol')]
    public ?string $docPol = null;

    #[Assert\Length(max: 255)]
    #[Groups(['docs:read', 'docs:write'])]
    #[SerializedName('DocInstruction')]
    public ?string $docInstruction = null;

    #[Assert\Length(max: 255)]
    #[Groups(['docs:read', 'docs:write'])]
    #[SerializedName('DocShortName')]
    public ?string $docShortName = null;

    // #[Assert\Length(max: 20000)]
    #[Groups(['docs:read', 'docs:write'])]
    #[SerializedName('base64File')]
    public ?string $base64File = null;

    #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'docDate must be in YYYY-MM-DD format')]
    #[Groups(['docs:read', 'docs:write'])]
    #[SerializedName('DocDate')]
    public ?string $docDate = null;
}