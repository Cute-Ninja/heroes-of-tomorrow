<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

/**
 * Class WorkoutRestStep
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
class WorkoutRestStep extends AbstractWorkoutStep
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
     * @var int $duration
     */
    protected $duration;

    /**
     * {@inheritdoc}
     */
    protected function getType()
    {
        return Exercise::TYPE_REST;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     *
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }
}