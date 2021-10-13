<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CylindreeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CylindreeRepository::class)
 */
class Cylindree
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_cylindree;

    /**
     * @ORM\OneToMany(targetEntity=Auto::class, mappedBy="cylindree")
     */
    private $auto;

    public function __construct()
    {
        $this->auto = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbCylindree(): ?int
    {
        return $this->nb_cylindree;
    }

    public function setNbCylindree(int $nb_cylindree): self
    {
        $this->nb_cylindree = $nb_cylindree;

        return $this;
    }

    /**
     * @return Collection|Auto[]
     */
    public function getAuto(): Collection
    {
        return $this->auto;
    }

    public function addAuto(Auto $auto): self
    {
        if (!$this->auto->contains($auto)) {
            $this->auto[] = $auto;
            $auto->setCylindree($this);
        }

        return $this;
    }

    public function removeAuto(Auto $auto): self
    {
        if ($this->auto->removeElement($auto)) {
            // set the owning side to null (unless already changed)
            if ($auto->getCylindree() === $this) {
                $auto->setCylindree(null);
            }
        }

        return $this;
    }
}
