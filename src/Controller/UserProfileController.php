<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Security;


class UserProfileController extends AbstractController
{
  private $security;

  public function __construct(
    Security $security
  )
  {
      $this->security = $security;
  }


  public function __invoke()
  {
    $user = $this->security->getUser();
    if(!$user){
      $response = new Response();
      $response->setStatusCode(401);
      return $response;
    }
    

    return $this->json([
        'firstname' => $user->getFirstname(),
        'lastname' => $user->getLastname(),
        'email' => $user->getEmail(),
        'roles' => $user->getRoles(),
      ]);
  }
}

