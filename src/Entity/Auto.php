<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AutoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      collectionOperations={"get"},
 *      itemOperations={"get"},
 *      normalizationContext={"groups"={"summary:read"}}
 * )
 * @ORM\Entity(repositoryClass=AutoRepository::class)
 */
class Auto
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
    private $immatriculation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_MEC;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VIN;

    /**
     * @Groups({"summary:read"})
     * @ORM\Column(type="string", length=255)
     */
    private $version;

    /**
     * @ORM\Column(type="integer")
     */
    private $place;

    /**
     * @ORM\Column(type="integer")
     */
    private $puissance_fiscale;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $kms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur_interieure;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sellerie;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_achat;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_entree;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_heure_vente;

    /**
     * @ORM\Column(type="integer")
     */
    private $puissance_Din;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prix_achat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prix_particulier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TVA_vente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prix_professionnel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_radio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $equipement_serie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $equipement_option;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $consommation_co2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poids_vide;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type_CNIT;

    /**
     * @Groups({"summary:read"})
     * @ORM\Column(type="date")
     */
    private $date_entree_arrivage;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $livraison_prevue_BC;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $livraison_prevue_BT;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $disponibilite;

    /**
     * @Groups({"summary:read"})
     * @ORM\ManyToOne(targetEntity=Marque::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @Groups({"summary:read"})
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fournisseur;

    /**
     * @Groups({"summary:read"})
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $modele;

    /**
     * @Groups({"summary:read"})
     * @ORM\ManyToOne(targetEntity=Energie::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $energie;

    /**
     * @ORM\ManyToOne(targetEntity=Carrosserie::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carrosserie;

    /**
     * @ORM\ManyToOne(targetEntity=Segment::class, inversedBy="autos")
     */
    private $segment;

    /**
     * @ORM\ManyToOne(targetEntity=Porte::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $porte;

    /**
     * @ORM\ManyToOne(targetEntity=Genre::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity=BoiteVitesse::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $boiteVitesse;

    /**
     * @ORM\ManyToOne(targetEntity=NombreRapport::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nombreRapport;

    /**
     * @ORM\ManyToOne(targetEntity=TVAAchat::class, inversedBy="autos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tVAAchat;

    /**
     * @ORM\ManyToOne(targetEntity=TypeGarantie::class, inversedBy="autos")
     */
    private $typeGarantie;

    /**
     * @ORM\ManyToOne(targetEntity=Cylindree::class, inversedBy="auto")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cylindree;

    /**
     * @Groups({"summary:read"})
     * @ORM\ManyToOne(targetEntity=Provenance::class, inversedBy="auto")
     * @ORM\JoinColumn(nullable=false)
     */
    private $provenance;

    /**
     * @Groups({"summary:read"})
     * @ORM\ManyToOne(targetEntity=Parc::class, inversedBy="autos")
     */
    private $parc;

    /**
     * @ORM\OneToOne(targetEntity=FraisReels::class, mappedBy="auto", cascade={"persist", "remove"})
     */
    private $fraisReels;

    

    public function __construct()
    {
        $this->frais = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getDateMEC(): ?\DateTimeInterface
    {
        return $this->date_MEC;
    }

    public function setDateMEC(?\DateTimeInterface $date_MEC): self
    {
        $this->date_MEC = $date_MEC;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(?string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getVIN(): ?string
    {
        return $this->VIN;
    }

    public function setVIN(string $VIN): self
    {
        $this->VIN = $VIN;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(int $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getPuissanceFiscale(): ?int
    {
        return $this->puissance_fiscale;
    }

    public function setPuissanceFiscale(int $puissance_fiscale): self
    {
        $this->puissance_fiscale = $puissance_fiscale;

        return $this;
    }

    public function getKms(): ?string
    {
        return $this->kms;
    }

    public function setKms(?string $kms): self
    {
        $this->kms = $kms;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getCouleurInterieure(): ?string
    {
        return $this->couleur_interieure;
    }

    public function setCouleurInterieure(?string $couleur_interieure): self
    {
        $this->couleur_interieure = $couleur_interieure;

        return $this;
    }

    public function getSellerie(): ?string
    {
        return $this->sellerie;
    }

    public function setSellerie(?string $sellerie): self
    {
        $this->sellerie = $sellerie;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(?\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->date_entree;
    }

    public function setDateEntree(?\DateTimeInterface $date_entree): self
    {
        $this->date_entree = $date_entree;

        return $this;
    }

    public function getDateHeureVente(): ?\DateTimeInterface
    {
        return $this->date_heure_vente;
    }

    public function setDateHeureVente(?\DateTimeInterface $date_heure_vente): self
    {
        $this->date_heure_vente = $date_heure_vente;

        return $this;
    }

    public function getPuissanceDin(): ?int
    {
        return $this->puissance_Din;
    }

    public function setPuissanceDin(int $puissance_Din): self
    {
        $this->puissance_Din = $puissance_Din;

        return $this;
    }

    public function getPrixAchat(): ?string
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(?string $prix_achat): self
    {
        $this->prix_achat = $prix_achat;

        return $this;
    }

    public function getPrixParticulier(): ?string
    {
        return $this->prix_particulier;
    }

    public function setPrixParticulier(?string $prix_particulier): self
    {
        $this->prix_particulier = $prix_particulier;

        return $this;
    }

    public function getTVAVente(): ?string
    {
        return $this->TVA_vente;
    }

    public function setTVAVente(?string $TVA_vente): self
    {
        $this->TVA_vente = $TVA_vente;

        return $this;
    }

    public function getPrixProfessionnel(): ?string
    {
        return $this->prix_professionnel;
    }

    public function setPrixProfessionnel(?string $prix_professionnel): self
    {
        $this->prix_professionnel = $prix_professionnel;

        return $this;
    }

    public function getCodeRadio(): ?string
    {
        return $this->code_radio;
    }

    public function setCodeRadio(?string $code_radio): self
    {
        $this->code_radio = $code_radio;

        return $this;
    }

    public function getEquipementSerie(): ?string
    {
        return $this->equipement_serie;
    }

    public function setEquipementSerie(?string $equipement_serie): self
    {
        $this->equipement_serie = $equipement_serie;

        return $this;
    }

    public function getEquipementOption(): ?string
    {
        return $this->equipement_option;
    }

    public function setEquipementOption(?string $equipement_option): self
    {
        $this->equipement_option = $equipement_option;

        return $this;
    }

    public function getConsommationCo2(): ?int
    {
        return $this->consommation_co2;
    }

    public function setConsommationCo2(?int $consommation_co2): self
    {
        $this->consommation_co2 = $consommation_co2;

        return $this;
    }

    public function getPoidsVide(): ?string
    {
        return $this->poids_vide;
    }

    public function setPoidsVide(?string $poids_vide): self
    {
        $this->poids_vide = $poids_vide;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getTypeCNIT(): ?string
    {
        return $this->type_CNIT;
    }

    public function setTypeCNIT(?string $type_CNIT): self
    {
        $this->type_CNIT = $type_CNIT;

        return $this;
    }

    public function getDateEntreeArrivage(): ?\DateTimeInterface
    {
        return $this->date_entree_arrivage;
    }

    public function setDateEntreeArrivage(\DateTimeInterface $date_entree_arrivage): self
    {
        $this->date_entree_arrivage = $date_entree_arrivage;

        return $this;
    }

    public function getLivraisonPrevueBC(): ?\DateTimeInterface
    {
        return $this->livraison_prevue_BC;
    }

    public function setLivraisonPrevueBC(?\DateTimeInterface $livraison_prevue_BC): self
    {
        $this->livraison_prevue_BC = $livraison_prevue_BC;

        return $this;
    }

    public function getLivraisonPrevueBT(): ?\DateTimeInterface
    {
        return $this->livraison_prevue_BT;
    }

    public function setLivraisonPrevueBT(?\DateTimeInterface $livraison_prevue_BT): self
    {
        $this->livraison_prevue_BT = $livraison_prevue_BT;

        return $this;
    }

    public function getdisponibilite(): ?\DateTimeInterface
    {
        return $this->disponibilite;
    }

    public function setdisponibilite(?\DateTimeInterface $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getEnergie(): ?Energie
    {
        return $this->energie;
    }

    public function setEnergie(?Energie $energie): self
    {
        $this->energie = $energie;

        return $this;
    }

    public function getCarrosserie(): ?Carrosserie
    {
        return $this->carrosserie;
    }

    public function setCarrosserie(?Carrosserie $carrosserie): self
    {
        $this->carrosserie = $carrosserie;

        return $this;
    }

    public function getSegment(): ?Segment
    {
        return $this->segment;
    }

    public function setSegment(?Segment $segment): self
    {
        $this->segment = $segment;

        return $this;
    }

    public function getPorte(): ?Porte
    {
        return $this->porte;
    }

    public function setPorte(?Porte $porte): self
    {
        $this->porte = $porte;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getBoiteVitesse(): ?BoiteVitesse
    {
        return $this->boiteVitesse;
    }

    public function setBoiteVitesse(?BoiteVitesse $boiteVitesse): self
    {
        $this->boiteVitesse = $boiteVitesse;

        return $this;
    }

    public function getNombreRapport(): ?NombreRapport
    {
        return $this->nombreRapport;
    }

    public function setNombreRapport(?NombreRapport $nombreRapport): self
    {
        $this->nombreRapport = $nombreRapport;

        return $this;
    }

    public function getTVAAchat(): ?TVAAchat
    {
        return $this->tVAAchat;
    }

    public function setTVAAchat(?TVAAchat $tVAAchat): self
    {
        $this->tVAAchat = $tVAAchat;

        return $this;
    }

    public function getTypeGarantie(): ?TypeGarantie
    {
        return $this->typeGarantie;
    }

    public function setTypeGarantie(?TypeGarantie $typeGarantie): self
    {
        $this->typeGarantie = $typeGarantie;

        return $this;
    }

    public function getCylindree(): ?Cylindree
    {
        return $this->cylindree;
    }

    public function setCylindree(?Cylindree $cylindree): self
    {
        $this->cylindree = $cylindree;

        return $this;
    }

    public function getProvenance(): ?Provenance
    {
        return $this->provenance;
    }

    public function setProvenance(?Provenance $provenance): self
    {
        $this->provenance = $provenance;

        return $this;
    }

    public function getParc(): ?Parc
    {
        return $this->parc;
    }

    public function setParc(?Parc $parc): self
    {
        $this->parc = $parc;

        return $this;
    }

    public function getFraisReels(): ?FraisReels
    {
        return $this->fraisReels;
    }

    public function setFraisReels(FraisReels $fraisReels): self
    {
        // set the owning side of the relation if necessary
        if ($fraisReels->getAuto() !== $this) {
            $fraisReels->setAuto($this);
        }

        $this->fraisReels = $fraisReels;

        return $this;
    }

    public function getLotAchat(): ?LotAchat
    {
        return $this->lotAchat;
    }

    public function setLotAchat(?LotAchat $lotAchat): self
    {
        $this->lotAchat = $lotAchat;

        return $this;
    }
}
