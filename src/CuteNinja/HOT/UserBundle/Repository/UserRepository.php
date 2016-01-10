<?php

namespace CuteNinja\HOT\UserBundle\Repository;

use CuteNinja\PersonaBundle\Repository\UserRepository as PersonaUserRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Class UserRepository
 *
 * @package CuteNinja\UserBundle\Repository
 */
class UserRepository extends PersonaUserRepository
{
    /**
     * @return QueryBuilder
     */
    public function getForListActionQueryBuilder()
    {
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder;
    }
}