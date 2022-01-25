<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventUserRepository::class)]
#[ApiResource]
class EventUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Event::class, inversedBy: 'eventUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private $event;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'eventUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'string', length: 255)]
    private $participation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

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

    public function getParticipation(): ?string
    {
        return $this->participation;
    }

    public function setParticipation(string $participation): self
    {
        $this->participation = $participation;

        return $this;
    }
}
