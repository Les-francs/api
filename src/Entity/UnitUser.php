<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UnitUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnitUserRepository::class)]
#[ApiResource(
    attributes: ["security" => "is_granted('ROLE_USER')"]
)]
class UnitUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Unit::class, inversedBy: 'unitUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private $unit;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'unitUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'integer')]
    private $level;

    #[ORM\ManyToOne(targetEntity: Control::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $control;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnit(): ?Unit
    {
        return $this->unit;
    }

    public function setUnit(?Unit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getControl(): ?Control
    {
        return $this->control;
    }

    public function setControl(?Control $control): self
    {
        $this->control = $control;

        return $this;
    }
}
