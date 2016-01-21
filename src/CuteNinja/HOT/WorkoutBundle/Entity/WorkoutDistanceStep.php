<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

/**
 * Class WorkoutDistanceStep
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
class WorkoutDistanceStep extends AbstractWorkoutStep
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var int $position
     */
    protected $position;

    /**
     * @var Workout $workout
     */
    protected $workout;

    /**
     * @var Exercise $exercise
     */
    protected $exercise;

    /**
     * @var int $distance
     */
    protected $distance;

    /**
     * {@inheritdoc}
     */
    protected function getType()
    {
        return Exercise::TYPE_DISTANCE;
    }

    /**
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     *
     * @return $this
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }
}