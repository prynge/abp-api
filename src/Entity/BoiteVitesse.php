<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BoiteVitesseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoiteVitesseRepository::class)
 */
class BoiteVitesse
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
    private $boite_vitesse_name;

    /**
     * @ORM\OneToMany(targetEntity=Auto::class, mappedBy="boiteVitesse", orphanRemoval=true)
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

    public function getBoiteVitesseName(): ?string
    {
        return $this->boite_vitesse_name;
    }

    public function setBoiteVitesseName(string $boite_vitesse_name): self
    {
        $this->boite_vitesse_name = $boite_vitesse_name;

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
            $auto->setBoiteVitesse($this);
        }

        return $this;
    }

    public function removeAuto(Auto $auto): self
    {
        if ($this->autos->removeElement($auto)) {
            // set the owning side to null (unless already changed)
            if ($auto->getBoiteVitesse() === $this) {
                $auto->setBoiteVitesse(null);
            }
        }

        return $this;
    }
}
