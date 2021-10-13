<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FraisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FraisRepository::class)
 */
class Frais
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
    private $frais_name;

    /**
     * @ORM\OneToMany(targetEntity=FraisReels::class, mappedBy="frais_name")
     */
    private $fraisReels;

    public function __construct()
    {
        $this->fraisReels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFraisName(): ?string
    {
        return $this->frais_name;
    }

    public function setFraisName(string $frais_name): self
    {
        $this->frais_name = $frais_name;

        return $this;
    }

    /**
     * @return Collection|FraisReels[]
     */
    public function getFraisReels(): Collection
    {
        return $this->fraisReels;
    }

    public function addFraisReel(FraisReels $fraisReel): self
    {
        if (!$this->fraisReels->contains($fraisReel)) {
            $this->fraisReels[] = $fraisReel;
            $fraisReel->setFraisName($this);
        }

        return $this;
    }

    public function removeFraisReel(FraisReels $fraisReel): self
    {
        if ($this->fraisReels->removeElement($fraisReel)) {
            // set the owning side to null (unless already changed)
            if ($fraisReel->getFraisName() === $this) {
                $fraisReel->setFraisName(null);
            }
        }

        return $this;
    }
}
