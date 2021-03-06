<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource(
    attributes: ["security" => "is_granted('ROLE_USER')"]
)]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ApiProperty(identifier: false)]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $username;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'string', length: 19, unique: true)]
    #[ApiProperty(identifier: true)]
    private $discord;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\ManyToOne(targetEntity: Weapon::class, inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private $weapon;

    #[ORM\Column(type: 'integer')]
    private $influence;

    #[ORM\ManyToOne(targetEntity: House::class, inversedBy: 'users')]
    private $house;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: UnitUser::class, cascade: ["persist"])]
    private $unitUsers;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: EventUser::class, cascade: ["persist"])]
    private $eventUsers;

    public function __construct()
    {
        $this->unitUsers = new ArrayCollection();
        $this->eventUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDiscord(): ?string
    {
        return $this->discord;
    }

    public function setDiscord(string $discord): self
    {
        $this->discord = $discord;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->discord;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(?Weapon $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getInfluence(): ?int
    {
        return $this->influence;
    }

    public function setInfluence(int $influence): self
    {
        $this->influence = $influence;

        return $this;
    }

    public function getHouse(): ?House
    {
        return $this->house;
    }

    public function setHouse(?House $house): self
    {
        $this->house = $house;

        return $this;
    }

    /**
     * @return Collection|UnitUser[]
     */
    public function getUnitUsers(): Collection
    {
        return $this->unitUsers;
    }

    public function addUnitUser(UnitUser $unitUser): self
    {
        if (!$this->unitUsers->contains($unitUser)) {
            $this->unitUsers[] = $unitUser;
            $unitUser->setUser($this);
        }

        return $this;
    }

    public function removeUnitUser(UnitUser $unitUser): self
    {
        if ($this->unitUsers->removeElement($unitUser)) {
            // set the owning side to null (unless already changed)
            if ($unitUser->getUser() === $this) {
                $unitUser->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EventUser[]
     */
    public function getEventUsers(): Collection
    {
        return $this->eventUsers;
    }

    public function addEventUser(EventUser $eventUser): self
    {
        if (!$this->eventUsers->contains($eventUser)) {
            $this->eventUsers[] = $eventUser;
            $eventUser->setUser($this);
        }

        return $this;
    }

    public function removeEventUser(EventUser $eventUser): self
    {
        if ($this->eventUsers->removeElement($eventUser)) {
            // set the owning side to null (unless already changed)
            if ($eventUser->getUser() === $this) {
                $eventUser->setUser(null);
            }
        }

        return $this;
    }
}
