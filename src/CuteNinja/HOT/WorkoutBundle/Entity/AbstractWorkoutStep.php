<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

use CuteNinja\MemoriaBundle\Entity\BaseEntity;

/**
 * Class AbstractWorkoutStep
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
abstract class AbstractWorkoutStep extends BaseEntity
{
    const TYPE_REST     = 'rest';
    const TYPE_DISTANCE = 'distance';
    const TYPE_DURATION = 'duration';
    const TYPE_AMRAP    = 'amrap';
    const TYPE_NOR      = 'nor';

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
     * @return string
     */
    protected abstract function getType();

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     *
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Workout
     */
    public function getWorkout()
    {
        return $this->workout;
    }

    /**
     * @param Workout $workout
     *
     * @return $this
     */
    public function setWorkout($workout)
    {
        $this->workout = $workout;

        return $this;
    }

    /**
     * @return Exercise
     */
    public function getExercise()
    {
        return $this->exercise;
    }

    /**
     * @param Exercise $exercise
     *
     * @return $this
     */
    public function setExercise($exercise)
    {
        $this->exercise = $exercise;

        return $this;
    }
}