<?php
declare(strict_types=1);

namespace App\Repository;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\ParameterType;

/**
 * Class UserRepository
 */
class UserRepository extends AbstractRepository
{
    /**
     * @param string $email
     *
     * @return array|null
     * @throws Exception
     */
    public function fetchUserByEmail(string $email): ?array
    {
        $user = $this->connection->fetchAssociative(
            'SELECT * FROM users WHERE email = :email;',
            [
                'email' => $email,
            ],
            [
                'email' => ParameterType::STRING,
            ]
        );

        return $user === false ? null : $user;
    }
}
