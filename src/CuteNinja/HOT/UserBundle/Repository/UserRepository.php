<?php

namespace CuteNinja\HOT\UserBundle\Repository;

use CuteNinja\PersonaBundle\Repository\UserRepository as PersonaUserRepository;

/**
 * Class UserRepository
 *
 * @package CuteNinja\UserBundle\Repository
 */
class UserRepository extends PersonaUserRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getForListActionQueryBuilder()
    {
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder;
    }
}