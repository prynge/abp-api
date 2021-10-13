<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EnergieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=EnergieRepository::class)
 */
class Energie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"summary:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $energie_name;

    /**
     * @ORM\OneToMany(targetEntity=Auto::class, mappedBy="energie", orphanRemoval=true)
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

    public function getEnergieName(): ?string
    {
        return $this->energie_name;
    }

    public function setEnergieName(string $energie_name): self
    {
        $this->energie_name = $energie_name;

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
            $auto->setEnergie($this);
        }

        return $this;
    }

    public function removeAuto(Auto $auto): self
    {
        if ($this->autos->removeElement($auto)) {
            // set the owning side to null (unless already changed)
            if ($auto->getEnergie() === $this) {
                $auto->setEnergie(null);
            }
        }

        return $this;
    }
}
