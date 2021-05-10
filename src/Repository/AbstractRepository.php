<?php
declare(strict_types=1);

namespace App\Repository;

use Doctrine\DBAL\Connection;

/**
 * Class AbstractRepository
 */
class AbstractRepository
{
    public function __construct(protected Connection $connection)
    {
    }
}
