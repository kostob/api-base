<?php
declare(strict_types=1);

namespace App\Security;

use App\Security\Jwt\JwtBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationServiceException;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * Class LoginSuccessHandler
 *
 * @package App\Security
 */
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{

    public function __construct(private JwtBuilder $jwtBuilder)
    {
    }

    /**
     * @inheritDoc
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token): Response
    {
        $user = $token->getUser();
        if (!$user instanceof ApiUser) {
            throw new AuthenticationServiceException('Invalid user object.');
        }

        $user->setApiToken($this->jwtBuilder->generateToken($user));

        return new JsonResponse(['token' => $user->getApiToken()]);
    }
}
