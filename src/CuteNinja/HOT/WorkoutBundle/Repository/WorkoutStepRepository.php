<?php

namespace CuteNinja\HOT\WorkoutBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Class WorkoutStepRepository
 *
 * @package CuteNinja\HOT\WorkoutBundle\Repository
 */
class WorkoutStepRepository extends EntityRepository
{
    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        $queryBuilder = $this->createQueryBuilder('workout_step');
        $queryBuilder->select('DISTINCT workout_step');

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