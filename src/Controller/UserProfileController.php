<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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


  public function __invoke($data)
  {
    $user = $this->security->getUser();
    

    return $this->json([
        'firstname' => $user->getFirstname(),
        'lastname' => $user->getLastname(),
        'email' => $user->getEmail(),
        'roles' => $user->getRoles(),
      ]);
  }
}

