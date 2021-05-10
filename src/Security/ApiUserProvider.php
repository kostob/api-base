<?php
declare(strict_types=1);

namespace App\Security;

use App\Repository\UserRepository;
use Doctrine\DBAL\Exception as DBALException;
use Exception;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use function explode;
use function is_subclass_of;
use function sprintf;

/**
 * Class ApiUserProvider
 */
class ApiUserProvider implements UserProviderInterface
{

    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @throws DBALException
     */
    public function loadUserByUsername(string $username): ApiUser
    {
        $user = $this->userRepository->fetchUserByEmail($username);

        if (!$user) {
            throw new UsernameNotFoundException();
        }

        $apiUser = new ApiUser();
        $apiUser->setId($user['id'])
            ->setName($user['name'])
            ->setEmail($user['email'])
            ->setPassword($user['password'])
            ->setRoles(explode(',', $user['roles']));

        return $apiUser;
    }

    /**
     * @param UserInterface $user
     *
     * @throws Exception
     */
    public function refreshUser(UserInterface $user)
    {
        // we have a stateless service, this method will never be called
        throw new Exception(sprintf('Method %s not supported.', __METHOD__));
    }

    public function supportsClass(string $class): bool
    {
        return ApiUser::class === $class || is_subclass_of($class, ApiUser::class);
    }
}
