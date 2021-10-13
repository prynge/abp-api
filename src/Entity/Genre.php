<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
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
    private $genre_name;

    /**
     * @ORM\OneToMany(targetEntity=Auto::class, mappedBy="genre", orphanRemoval=true)
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

    public function getGenreName(): ?string
    {
        return $this->genre_name;
    }

    public function setGenreName(string $genre_name): self
    {
        $this->genre_name = $genre_name;

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
            $auto->setGenre($this);
        }

        return $this;
    }

    public function removeAuto(Auto $auto): self
    {
        if ($this->autos->removeElement($auto)) {
            // set the owning side to null (unless already changed)
            if ($auto->getGenre() === $this) {
                $auto->setGenre(null);
            }
        }

        return $this;
    }
}
