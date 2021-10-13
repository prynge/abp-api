<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;


class CreateUserController extends AbstractController
{
  private $em;
  private $security;

  public function __construct(EntityManagerInterface $em,
    Security $security
  )
  {
      $this->em = $em;
      $this->security = $security;
  }


  public function __invoke(Request $request, UserPasswordEncoderInterface $passwordEncoder)
  {
    $body = json_decode($request->getContent(), true);
    
    $user = new User();
            $user->setEmail($body['email']);
            $user->setFirstname($body['firstname']);
            $user->setLastname($body['lastname']);
            $user->setImporter($body['importer']);
            $user->setPassword($passwordEncoder->encodePassword(
                $user,
                $body['password']
            ));

      $this->em->persist($user);
      $this->em->flush();
    return new Response(json_encode($user), 201);
  }
}

