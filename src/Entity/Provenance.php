<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProvenanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProvenanceRepository::class)
 */
class Provenance
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
    private $provenance_name;

    /**
     * @ORM\OneToMany(targetEntity=Auto::class, mappedBy="provenance", orphanRemoval=true)
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

    public function getProvenanceName(): ?string
    {
        return $this->provenance_name;
    }

    public function setProvenanceName(string $provenance_name): self
    {
        $this->provenance_name = $provenance_name;

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
            $auto->setProvenance($this);
        }

        return $this;
    }

    public function removeAuto(Auto $auto): self
    {
        if ($this->auto->removeElement($auto)) {
            // set the owning side to null (unless already changed)
            if ($auto->getProvenance() === $this) {
                $auto->setProvenance(null);
            }
        }

        return $this;
    }
}
