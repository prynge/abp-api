<?php

namespace App\Entity;

use App\Repository\FraisReelsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FraisReelsRepository::class)
 */
class FraisReels
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
    private $valeur;

    /**
     * @ORM\OneToOne(targetEntity=Auto::class, inversedBy="fraisReels", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $auto;

    /**
     * @ORM\ManyToOne(targetEntity=Frais::class, inversedBy="fraisReels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $frais_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getAuto(): ?Auto
    {
        return $this->auto;
    }

    public function setAuto(Auto $auto): self
    {
        $this->auto = $auto;

        return $this;
    }

    public function getFraisName(): ?Frais
    {
        return $this->frais_name;
    }

    public function setFraisName(?Frais $frais_name): self
    {
        $this->frais_name = $frais_name;

        return $this;
    }
}
