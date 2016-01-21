<?php

namespace CuteNinja\HOT\WorkoutBundle\Repository;

use CuteNinja\HOT\WorkoutBundle\Entity\AbstractWorkout;
use CuteNinja\HOT\WorkoutBundle\Entity\HotWorkout;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
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
     * @param integer $userId
     *
     * @return QueryBuilder
     */
    public function getForListActionQueryBuilder($userId)
    {
        $queryBuilder = $this->getQueryBuilder();

        $queryBuilder->where('workout INSTANCE OF :workoutType');
        $queryBuilder->setParameter('workoutType', AbstractWorkout::TYPE_HOT);

        return $queryBuilder;
    }

    /**
     * @param integer $id
     *
     * @return AbstractWorkout|null
     *
     * @throws NonUniqueResultException
     */
    public function getForGetAction($id)
    {
        $queryBuilder = $this->getQueryBuilder();

        $queryBuilder->where('workout.id = :workoutId');
        $queryBuilder->setParameter('workoutId', $id);

        $queryBuilder->leftJoin('workout.workoutSteps', 'workout_step');
        $queryBuilder->leftJoin('workout_step.exercise', 'exercise');

        $queryBuilder->addSelect('workout_step');
        $queryBuilder->addSelect('exercise');

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
}