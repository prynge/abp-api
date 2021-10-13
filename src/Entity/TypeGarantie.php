<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeGarantieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeGarantieRepository::class)
 */
class TypeGarantie
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
    private $garantie_name;

    /**
     * @ORM\OneToMany(targetEntity=Auto::class, mappedBy="typeGarantie")
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

    public function getGanrantieName(): ?string
    {
        return $this->garantie_name;
    }

    public function setGanrantieName(string $garantie_name): self
    {
        $this->garantie_name = $garantie_name;

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
            $auto->setTypeGarantie($this);
        }

        return $this;
    }

    public function removeAuto(Auto $auto): self
    {
        if ($this->autos->removeElement($auto)) {
            // set the owning side to null (unless already changed)
            if ($auto->getTypeGarantie() === $this) {
                $auto->setTypeGarantie(null);
            }
        }

        return $this;
    }
}
