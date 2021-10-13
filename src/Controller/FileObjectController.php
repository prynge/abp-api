<?php
// api/src/Controller/GetFileObjectAction.php

namespace App\Controller;
use App\Entity\FileObject;
use App\Entity\Auto;
use App\Entity\BoiteVitesse;
use App\Entity\Carrosserie;
use App\Entity\Cylindree;
use App\Entity\Energie;
use App\Entity\Fournisseur;
use App\Entity\Frais;
use App\Entity\FraisReels;
use App\Entity\Genre;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\NombreRapport;
use App\Entity\Parc;
use App\Entity\Porte;
use App\Entity\Provenance;
use App\Entity\LotAchat;
use App\Entity\Segment;
use App\Entity\TVAAchat;
use App\Entity\TypeGarantie;
use App\Repository\AutoRepository;
use App\Repository\BoiteVitesseRepository;
use App\Repository\CarrosserieRepository;
use App\Repository\CylindreeRepository;
use App\Repository\EnergieRepository;
use App\Repository\FournisseurRepository;
use App\Repository\FraisRepository;
use App\Repository\FraisReelsRepository;
use App\Repository\GenreRepository;
use App\Repository\MarqueRepository;
use App\Repository\ModeleRepository;
use App\Repository\NombreRapportRepository;
use App\Repository\ParcRepository;
use App\Repository\PorteRepository;
use App\Repository\ProvenanceRepository;
use App\Repository\LotAchatRepository;
use App\Repository\SegmentRepository;
use App\Repository\TVAAchatRepository;
use App\Repository\TypeGarantieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

final class FileObjectController
{
    private $em ;
    public function __construct(AutoRepository $autoRepository,
    BoiteVitesseRepository $bvRepository,
    CarrosserieRepository $carrosserieRepository,
    CylindreeRepository $cylindreeRepository,
    EnergieRepository $energieRepository,
    FournisseurRepository $fournisseurRepository,
    FraisRepository $fraisRepository,
    FraisReelsRepository $fraisReelsRepository,
    GenreRepository $genreRepository,
    MarqueRepository $marqueRepository,
    ModeleRepository $modeleRepository,
    NombreRapportRepository $nbRapportRepository,
    ParcRepository $parcRepository,
    PorteRepository $porteRepository,
    ProvenanceRepository $provenanceRepository,
    LotAchatRepository $lotAchatRepository,
    SegmentRepository $segmentRepository,
    TVAAchatRepository $tvaachatRepository,
    TypeGarantieRepository $typeRepository, EntityManagerInterface $em)
    {
        $this->autoRepository = $autoRepository;
        $this->bvRepository = $bvRepository;
        $this->carrosserieRepository = $carrosserieRepository;
        $this->cylindreeRepository = $cylindreeRepository;
        $this->energieRepository = $energieRepository;
        $this->fournisseurRepository = $fournisseurRepository;
        $this->fraisRepository = $fraisRepository;
        $this->fraisReelsRepository = $fraisReelsRepository;
        $this->genreRepository = $genreRepository;
        $this->marqueRepository = $marqueRepository;
        $this->modeleRepository = $modeleRepository;
        $this->nbRapportRepository = $nbRapportRepository;
        $this->parcRepository = $parcRepository;
        $this->porteRepository = $porteRepository;
        $this->provenanceRepository = $provenanceRepository;
        $this->lotAchatRepository = $lotAchatRepository;
        $this->segmentRepository = $segmentRepository;
        $this->tvaachatRepository = $tvaachatRepository;
        $this->typeRepository = $typeRepository;
        $this->em = $em;
    }

    public function __invoke(Request $request):Response
    {
        $id = $request->attributes->get('file');
        $file = "../datafiles/files/" . $id;
        $this->import($file);
        $res = new Response();
		$res->setContent('{message: Successfully saved}');
		$res->headers->set('Content-Type', 'Application/json');
		$res->setStatusCode(Response::HTTP_OK);
        return $res;
    }

    public function import($request)
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($request);

        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $head=$sheetData[0];
        unset($sheetData[0]);

        foreach ($sheetData as $i=>$t) {
            $this->save($t,$head);
        }
    }

    public function save($line, $head){
        $auto= new Auto();
        $frais=null;
        $date=new \DateTime;
        foreach ($line as $key => $value) {
            switch ($head[$key]) {
                case 'Boîte de vitesse':
                    $bv = $this->bvRepository->findOneBy(['boite_vitesse_name'=>$value]);
                    if (!$bv  or !$bv instanceof BoiteVitesse) {
                        $bv = new BoiteVitesse();
                        $bv->setBoiteVitesseName($value);
                        $this->em->persist($bv);
                    }
                    $auto->setBoiteVitesse($bv);
                    break;
                
                case 'Carrosserie':
                    $carrosserie = $this->carrosserieRepository->findOneBy(['carrosserie_name'=>$value]);
                    if (!$carrosserie  or !$carrosserie instanceof Carrosserie) {
                        $carrosserie = new Carrosserie();
                        $carrosserie->setCarrosserieName($value);
                        $this->em->persist($carrosserie);
                    }
                    $auto->setCarrosserie($carrosserie);
                    break;
                
                case 'Cylindrée':
                    $cylindree = $this->cylindreeRepository->findOneBy(['nb_cylindree'=>$value]);
                    if (!$cylindree  or !$cylindree instanceof Cylindree) {
                        $cylindree = new Cylindree();
                        $cylindree->setNbCylindree($value);
                        $this->em->persist($cylindree);
                    }
                    $auto->setCylindree($cylindree);
                    break;
                    
                case 'Énergie':
                    $energie = $this->energieRepository->findOneBy(['energie_name'=>$value]);
                    if (!$energie  or !$energie instanceof Energie) {
                        $energie = new Energie();
                        $this->em->persist($energie);
                        $energie->setEnergieName($value);
                    }
                    $auto->setEnergie($energie);
                    break;
                    
                case 'Fournisseur':
                    $fournisseur = $this->fournisseurRepository->findOneBy(['frs_name'=>$value]);
                    if (!$fournisseur  or !$fournisseur instanceof Fournisseur) {
                        $fournisseur = new Fournisseur();
                        $fournisseur->setFrsName($value);
                        $this->em->persist($fournisseur);
                    }
                    $auto->setFournisseur($fournisseur);
                    // 
                    
                    break;
                    
                case 'Frais':
                    $frais = $this->fraisRepository->findOneBy(['frais_name'=>$value]);
                    if (!$frais  or !$frais instanceof Frais) {
                        $frais = new Frais();
                        $frais->setFraisName($value);
                        $this->em->persist($frais);
                    }
                    break;
                    
                case 'Genre':
                    $genre = $this->genreRepository->findOneBy(['genre_name'=>$value]);
                    if (!$genre  or !$genre instanceof Genre) {
                        $genre = new Genre();
                        $genre->setGenreName($value);
                        $this->em->persist($genre);
                    }
                    $auto->setGenre($genre);
                    break;
                    
                case 'Marque':
                    $marque = $this->marqueRepository->findOneBy(['marque_name'=>$value]);
                    if (!$marque  or !$marque instanceof Marque) {
                        $marque = new Marque();
                        $marque->setMarqueName($value);
                        $this->em->persist($marque);
                    }
                    $auto->setMarque($marque);
                    break;
                    
                case 'Modèle':
                    $modele = $this->modeleRepository->findOneBy(['modele_name'=>$value]);
                    if (!$modele  or !$modele instanceof Modele) {
                        $modele = new Modele();
                        $modele->setModeleName($value);
                        $this->em->persist($modele);
                    }
                    $auto->setModele($modele);
                    break;
                    
                case 'Nombre de rapports':
                    $nombre_rapport = $this->nbRapportRepository->findOneBy(['nombre_rapport'=>$value]);
                    if (!$nombre_rapport  or !$nombre_rapport instanceof NombreRapport) {
                        $nombre_rapport = new NombreRapport();
                        $nombre_rapport->setNombreRapport($value);
                        $this->em->persist($nombre_rapport);
                    }
                    $auto->setNombreRapport($nombre_rapport);
                    break;
                    
                case 'Parc':
                    $parc = $this->parcRepository->findOneBy(['parc_name'=>$value]);
                    if (!$parc  or !$parc instanceof Parc) {
                        $parc = new Parc();
                        $parc->setParcName($value);
                        $this->em->persist($parc);
                    }
                    $auto->setParc($parc);
                    break;
                    
                case 'Portes':
                    $porte = $this->porteRepository->findOneBy(['nb_porte'=>$value]);
                    if (!$porte  or !$porte instanceof Porte) {
                        $porte = new Porte();
                        $porte->setNbPorte($value);
                        $this->em->persist($porte);
                    }
                    $auto->setPorte($porte);
                    break;
                    
                case 'Provenance':
                    $provenance = $this->provenanceRepository->findOneBy(['provenance_name'=>$value]);
                    if (!$provenance  or !$provenance instanceof Provenance) {
                        $provenance = new Provenance();
                        $provenance->setProvenanceName($value);
                        $this->em->persist($provenance);
                    }
                    $auto->setProvenance($provenance);
                    break;
                    
                case "N° Lot d'achat":
                    $lotAchat = $this->lotAchatRepository->findOneBy(['numero_lot'=>$value]);
                    if (!$lotAchat  or !$lotAchat instanceof LotAchat) {
                        $lotAchat = new LotAchat();
                        $lotAchat->setNumeroLot($value);
                        $this->em->persist($lotAchat);
                    }
                    $auto->setLotAchat($lotAchat);
                    break;
                    
                case 'Segment':
                    $segment = $this->segmentRepository->findOneBy(['segment_name'=>$value]);
                    if (!$segment  or !$segment instanceof Segment) {
                        $segment = new Segment();
                        $segment->setSegmentName($value);
                        $this->em->persist($segment);
                    }
                    $auto->setSegment($segment);
                    break;
                    
                case "TVA à l'achat":
                    $tva_achat = $this->tvaachatRepository->findOneBy(['TVA_name'=>$value]);
                    if (!$tva_achat  or !$tva_achat instanceof TVAAchat) {
                        $tva_achat = new TVAAchat();
                        $tva_achat->setTVAName($value);
                        $this->em->persist($tva_achat);
                    }
                    $auto->setTVAAchat($tva_achat);
                    
                    break;
                    
                case "Type de garantie":
                    $type_garantie = $this->typeRepository->findOneBy(['garantie_name'=>$value]);
                    if (!$type_garantie  or !$type_garantie instanceof TypeGarantie) {
                        $type_garantie = new TypeGarantie();
                        $type_garantie->setGanrantieName($value);
                        $this->em->persist($type_garantie);
                    }
                    $auto->setTypeGarantie($type_garantie);
                    break;

                case "Immat.":
                    $auto->setImmatriculation($value);
                    break;
                     
                case "Date de MEC":
                    $value = $date->createFromFormat('d/m/Y',$value) ? $date->createFromFormat('d/m/Y',$value) :null;
                    $auto->setDateMEC($value);
                    break;
                     
                case "Année":
                    $auto->setAnnee($value);
                    break;
                     
                case "VIN":
                    $auto->setVIN($value);
                    break;
                     
                case "Version":
                    $auto->setVersion($value);
                    break;
                     
                case "Places":
                    $auto->setPlace($value);
                    break;
                     
                case "Puissance fiscale":
                    $auto->setPuissanceFiscale($value);
                    break;
                     
                case "Kms":
                    $auto->setKms(intval($value));
                    break;
                     
                case "Couleur":
                    $auto->setCouleur($value);
                    break;
                     
                case "Couleur intérieure":
                    $auto->setCouleurInterieure($value);
                    break;
                     
                case "Sellerie":
                    $auto->setSellerie($value);
                    break;
                     
                case "Date d'achat":
                    $value = $date->createFromFormat('d/m/Y',$value) ? $date->createFromFormat('d/m/Y',$value) :null;
                    $auto->setDateAchat($value);
                    break;
                     
                case "Date d'entrée au parc":
                    $value = $date->createFromFormat('d/m/Y',$value) ? $date->createFromFormat('d/m/Y',$value) :null;
                    $auto->setDateEntree($value);
                    break;
                     
                case "Couleur intérieure":
                    $auto->setCouleurInterieure($value);
                    break;
                     
                case "Date/h. vente":
                    $value = $date->createFromFormat('d/m/Y',$value) ? $date->createFromFormat('d/m/Y',$value) :null;
                    $auto->setDateHeureVente($value);
                    break;
                     
                case "Puissance DIN":
                    $auto->setPuissanceDin($value);
                    break;
                     
                case "Prix d'achat":
                    $auto->setPrixAchat($value);
                    break;
                     
                case "Prix particulier TTC":
                    $auto->setPrixParticulier($value);
                    break;
                     
                case "TVA vente véhicule":
                    $auto->setTVAVente($value);
                    break;
                     
                case "Prix professionnel TTC":
                    $auto->setPrixProfessionnel($value);
                    break;
                     
                case "Code radio":
                    $auto->setCodeRadio($value);
                    break;
                     
                case "Equip. de série":
                    $auto->setEquipementSerie($value);
                    break;
                     
                case "Equip. en option":
                    $auto->setEquipementOption($value);
                    break;
                     
                case "Conso CO2":
                    $auto->setConsommationCo2(intval($value));
                    break;
                     
                case "Poids à vide Min":
                    $auto->setPoidsVide($value);
                    break;
                     
                case "Durée (en mois)":
                    $auto->setDuree(intval($value));
                    break;
                     
                case "Type/C.N.I.T":
                    $auto->setTypeCNIT($value);
                    break;
                     
                case "Date d'entrée en arrivage":
                    $value = $date->createFromFormat('d/m/Y',$value) ? $date->createFromFormat('d/m/Y',$value) :null;
                    $auto->setDateEntreeArrivage($value);
                    break;
                     
                case "Livraison prévue le (BC)":
                    $value = $date->createFromFormat('d/m/Y',$value) ? $date->createFromFormat('d/m/Y',$value) :null;
                    $auto->setLivraisonPrevueBC($value);
                    break;
                     
                case "Livraison prévue le (BT)":
                    $value = $date->createFromFormat('d/m/Y',$value) ? $date->createFromFormat('d/m/Y',$value) :null;
                    $auto->setLivraisonPrevueBT($value);
                    break;
                     
                case "Dispo le":
                    $value = $date->createFromFormat('d/m/Y',$value) ? $date->createFromFormat('d/m/Y',$value) :null;
                    $auto->setdisponibilite($value);
                    break;
                     
                case "Frais réel HT":
                    $fraisReels = $this->fraisReelsRepository->findOneBy(['auto'=>$auto,'frais_name'=>$frais]);
                    if (!$fraisReels  or !$fraisReels instanceof FraisReels) {
                        $fraisReels = new FraisReels();
                    }
                    $fraisReels->setFraisName($frais);
                    $fraisReels->setAuto($auto);
                    $fraisReels->setValeur($value);
                    break;
            }
            
        }
        $this->em->persist($auto);
        $this->em->flush();
        
    }
}