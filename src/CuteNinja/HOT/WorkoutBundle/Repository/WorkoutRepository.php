<?php

namespace CuteNinja\HOT\WorkoutBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Class WorkoutRepository
 *
 * @package CuteNinja\HOT\WorkoutBundle\Repository
 */
class WorkoutRepository extends EntityRepository
{
    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        $queryBuilder = $this->createQueryBuilder('workout');
        $queryBuilder->select('DISTINCT workout');

        return $queryBuilder;
    }

    /**
     * @return QueryBuilder
     */
    public function getForListActionQueryBuilder()
    {
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder;
    }
}