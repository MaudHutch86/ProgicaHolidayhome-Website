<?php

namespace App\Entity;
use App\Form\BBType;
use App\Entity\HolidayHome;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AmenitiesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=AmenitiesRepository::class)
 */
class Amenities
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=HolidayHome::class, mappedBy="anemities")
     */
    private $yes;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
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

    /**
     * @return Collection|HolidayHome[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(HolidayHome $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->addAmenity($this);
        }

        return $this;
    }

    public function removeYe(HolidayHome $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            $ye->removeAmenity($this);
        }

        return $this;
    }
}
