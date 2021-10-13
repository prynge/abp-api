<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 */
class Fournisseur
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
    private $frs_name;

    /**
     * @ORM\OneToMany(targetEntity=Auto::class, mappedBy="fournisseur")
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

    public function getFrsName(): ?string
    {
        return $this->frs_name;
    }

    public function setFrsName(string $frs_name): self
    {
        $this->frs_name = $frs_name;

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
            $auto->setFournisseur($this);
        }

        return $this;
    }

    public function removeAuto(Auto $auto): self
    {
        if ($this->autos->removeElement($auto)) {
            // set the owning side to null (unless already changed)
            if ($auto->getFournisseur() === $this) {
                $auto->setFournisseur(null);
            }
        }

        return $this;
    }
}
