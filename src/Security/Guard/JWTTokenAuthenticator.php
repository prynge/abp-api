<?php 
namespace App\Security\Guard;

use Symfony\Component\HttpFoundation\Request;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\TokenExtractorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator as BaseAuthenticator;
use Symfony\Component\HttpFoundation\RequestStack;

class JWTTokenAuthenticator extends BaseAuthenticator
{
    private $request;

    /**
     * @param JWTTokenManagerInterface $jwtManager
     * @param EventDispatcherInterface $dispatcher
     * @param TokenExtractorInterface  $tokenExtractor
     */
    public function __construct(
        JWTTokenManagerInterface $jwtManager,
        EventDispatcherInterface $dispatcher,
        TokenExtractorInterface $tokenExtractor,
        TokenStorageInterface $preAuthenticationTokenStorage,
        RequestStack $request
    ) {
        $this->request = $request->getCurrentRequest();
        parent::__construct($jwtManager, $dispatcher, $tokenExtractor, $preAuthenticationTokenStorage);
    }

    /**
     * Loads the user to authenticate.
     *
     * @param UserProviderInterface $userProvider An user provider
     * @param array                 $payload      The token payload
     * @param string                $identity     The key from which to retrieve the user "username"
     *
     * @return UserInterface
     */
    function loadUser(UserProviderInterface $userProvider, array $payload, $identity)
    {
        $ruser = parent::loadUser($userProvider, $payload, $identity);

        return $ruser;
    }
}
