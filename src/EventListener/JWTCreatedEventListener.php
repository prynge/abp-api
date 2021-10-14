<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\HttpFoundation\Request;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\TokenExtractorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator as BaseAuthenticator;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class JWTCreatedEventListener extends BaseAuthenticator
{

    private $request;

    /**
     * @param JWTTokenManagerInterface $jwtManager
     * @param EventDispatcherInterface $dispatcher
     * @param TokenExtractorInterface $tokenExtractor
     */
    public function __construct(
        JWTTokenManagerInterface $jwtManager,
        EventDispatcherInterface $dispatcher,
        TokenExtractorInterface $tokenExtractor,
        TokenStorageInterface $preAuthenticationTokenStorage,
        RequestStack $request
    )
    {
        $this->request = $request->getCurrentRequest();
        parent::__construct($jwtManager, $dispatcher, $tokenExtractor, $preAuthenticationTokenStorage);
    }


    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();

        if (!$user instanceof UserInterface) {
            throw new AccessDeniedHttpException(sprintf("Cannot retrieve User Interface"));
        }

        if ($user) {
            $data['user']=["firstname"=>$user->getFirstname(),"lastname"=>$user->getLastName(),"roles"=>$user->getRoles(),"email"=>$user->getEmail(),];
            $event->setData($data);
        }

    }

}

?>