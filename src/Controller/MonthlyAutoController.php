<?php

namespace App\Controller;

use App\Entity\Auto;
use App\Repository\AutoRepository;
use ApiPlatform\Core\Api\IriConverterInterface;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;




class MonthlyAutoController extends AbstractController
{	
	
    public function __construct(AutoRepository $autoRepository,EntityManagerInterface $em){
        $this->autoRepository=$autoRepository;
		// $this->qb = $em->createQueryBuilder();
    }

    public function __invoke(Request $request): Response
    {
		$month = $request->attributes->get('month')+1;
		$year = $request->attributes->get('year');
		$autos = $this->autoRepository->findAll();
		$monthly=[];
		$date = new \DateTime();
		$date = $date->setDate($year,$month,1)->format('Y-m-d');
		$date_b=date("Y-m-01", strtotime($date));
		$date_e=date("Y-m-t", strtotime($date));
		foreach ($autos as $auto) {
			
			if ($auto->getDateEntreeArrivage()->format('Y-m-d')>=$date_b &$auto->getDateEntreeArrivage()->format('Y-m-d')<=$date_e) {
				// echo $auto->getMarque()->getMarqueName();
				$aut = [
					"immatriculation"=>$auto->getImmatriculation(),
					"date_entree_arrivage"=>$auto->getDateEntreeArrivage(),
					"marque"=>$auto->getMarque()->getMarqueName(),
					"modele"=>$auto->getModele()->getModeleName(),
					"version"=>$auto->getVersion(),
					"fournisseur"=>$auto->getFournisseur()->getFrsName(),
					"energie"=>$auto->getEnergie()->getEnergieName(),
					"provenance"=>$auto->getProvenance()->getProvenanceName(),
					"parc"=>$auto->getParc()->getParcName(),
				];
				array_push($monthly,$aut);
			}
		}
		$response = new Response();
		$res = [
			"@context"=> "/api/contexts/Auto",
			"@id"=> "/api/autos",
			"@type"=> "hydra:Collection",
			"hydra:member"=>$monthly,
			"hydra:totalItems"=> count($monthly)
		];
		$response->headers->set('Content-Type', 'Application/ld+json');
		$response->setContent(json_encode($res));
        return $response;
    }
}
