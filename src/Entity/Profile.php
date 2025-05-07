<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'profile')]
class Profile
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $user = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $profile = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(?string $profile): self
    {
        $this->profile = $profile;
        return $this;
    }

    public function getPassword(): ?int
    {
        return $this->password;
    }

    public function setPassword(?int $password): self
    {
        $this->password = $password;
        return $this;
    }
}