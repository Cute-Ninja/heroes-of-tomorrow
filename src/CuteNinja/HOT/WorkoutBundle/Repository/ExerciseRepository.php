<?php

namespace CuteNinja\HOT\WorkoutBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Class ExerciseRepository
 *
 * @package CuteNinja\HOT\WorkoutBundle\Repository
 */
class ExerciseRepository extends EntityRepository
{
    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        $queryBuilder = $this->createQueryBuilder('exercise');
        $queryBuilder->select('DISTINCT exercise');

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