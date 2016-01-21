<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

/**
 * Class WorkoutAmrapRestStep
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
class WorkoutAmrapStep extends AbstractWorkoutStep
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
        return Exercise::TYPE_AMRAP;
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