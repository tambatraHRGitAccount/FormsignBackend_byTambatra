<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class UserDto
{
    #[Groups(['user:read'])]
    public ?int $id = null;

    #[Assert\NotBlank(groups: ['user:write'])]
    #[Assert\Email(groups: ['user:write'])]
    #[Groups(['user:read', 'user:write'])]
    public ?string $email = null;

    #[Assert\NotBlank(groups: ['user:write'])]
    #[Assert\Length(min: 3, max: 100, groups: ['user:write'])]
    #[Groups(['user:read', 'user:write'])]
    public ?string $username = null;

    #[Assert\NotBlank(groups: ['user:write'])]
    #[Assert\Length(min: 6, groups: ['user:write'])]
    #[Groups(['user:write'])]
    #[SerializedName('password')]
    public ?string $password = null;

    #[Assert\Choice(choices: ['ROLE_USER', 'ROLE_ADMIN'], multiple: true, groups: ['user:write'])]
    #[Groups(['user:read', 'user:write'])]
    public ?array $roles = null;

    #[Groups(['user:read'])]
    #[SerializedName('last_login')]
    public ?string $lastLogin = null;
}