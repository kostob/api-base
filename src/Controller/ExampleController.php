<?php
declare(strict_types=1);

namespace App\Controller;

use App\Security\ApiUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ExampleController
 */
class ExampleController extends AbstractController
{
    public function example(): JsonResponse
    {
        $loggedInUser = $this->getUser();

        if (!$loggedInUser instanceof ApiUser) {
            return new JsonResponse('Invalid user class.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse(
            [
                'user' => [
                    'id' => $loggedInUser->getId(),
                    'name' => $loggedInUser->getName(),
                    'email' => $loggedInUser->getEmail(),
                    'roles' => $loggedInUser->getRoles(),
                ],
            ]
        );
    }
}
