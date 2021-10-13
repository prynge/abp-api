<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CarrosserieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarrosserieRepository::class)
 */
class Carrosserie
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
    private $carrosserie_name;

    /**
     * @ORM\OneToMany(targetEntity=Auto::class, mappedBy="carrosserie", orphanRemoval=true)
     */
    private $autos;

    public function __construct()
    {
        $this->autos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarrosserieName(): ?string
    {
        return $this->carrosserie_name;
    }

    public function setCarrosserieName(string $carrosserie_name): self
    {
        $this->carrosserie_name = $carrosserie_name;

        return $this;
    }

    /**
     * @return Collection|Auto[]
     */
    public function getAutos(): Collection
    {
        return $this->autos;
    }

    public function addAuto(Auto $auto): self
    {
        if (!$this->autos->contains($auto)) {
            $this->autos[] = $auto;
            $auto->setCarrosserie($this);
        }

        return $this;
    }

    public function removeAuto(Auto $auto): self
    {
        if ($this->autos->removeElement($auto)) {
            // set the owning side to null (unless already changed)
            if ($auto->getCarrosserie() === $this) {
                $auto->setCarrosserie(null);
            }
        }

        return $this;
    }
}
