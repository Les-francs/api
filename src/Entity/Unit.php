<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UnitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnitRepository::class)]
#[ApiResource]
class Unit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $influence;

    #[ORM\ManyToOne(targetEntity: TypeUnit::class, inversedBy: 'units')]
    #[ORM\JoinColumn(nullable: false)]
    private $typeUnit;

    #[ORM\ManyToOne(targetEntity: Era::class, inversedBy: 'units')]
    #[ORM\JoinColumn(nullable: false)]
    private $era;

    #[ORM\OneToMany(mappedBy: 'unit', targetEntity: UnitUser::class)]
    private $unitUsers;

    public function __construct()
    {
        $this->unitUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getTypeUnit(): ?TypeUnit
    {
        return $this->typeUnit;
    }

    public function setTypeUnit(?TypeUnit $typeUnit): self
    {
        $this->typeUnit = $typeUnit;

        return $this;
    }

    public function getEra(): ?Era
    {
        return $this->era;
    }

    public function setEra(?Era $era): self
    {
        $this->era = $era;

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
            $unitUser->setUnit($this);
        }

        return $this;
    }

    public function removeUnitUser(UnitUser $unitUser): self
    {
        if ($this->unitUsers->removeElement($unitUser)) {
            // set the owning side to null (unless already changed)
            if ($unitUser->getUnit() === $this) {
                $unitUser->setUnit(null);
            }
        }

        return $this;
    }
}
