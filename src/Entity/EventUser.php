<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EventUserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: EventUserRepository::class)]
#[ApiResource(
    attributes: ["security" => "is_granted('ROLE_USER')"]
)]
#[UniqueEntity(
    fields: ['event', 'user'],
    errorPath: 'event',
    message: 'This event is already in use on that user.',
)]
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

    #[ORM\Column(type: 'boolean', length: 255, nullable: true)]
    private $participation = null;

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

    public function getParticipation(): ?bool
    {
        return $this->participation;
    }

    public function setParticipation(?bool $participation): self
    {
        $this->participation = $participation;

        return $this;
    }
}
