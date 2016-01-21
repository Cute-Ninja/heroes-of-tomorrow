<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

/**
 * Class WorkoutNorStep
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
class WorkoutNorStep extends AbstractWorkoutStep
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
     * @var int $numberOfRepetition
     */
    protected $numberOfRepetition;

    /**
     * {@inheritdoc}
     */
    protected function getType()
    {
        return Exercise::TYPE_NOR;
    }

    /**
     * @return int
     */
    public function getNumberOfRepetition()
    {
        return $this->numberOfRepetition;
    }

    /**
     * @param int $numberOfRepetition
     *
     * @return $this
     */
    public function setNumberOfRepetition($numberOfRepetition)
    {
        $this->numberOfRepetition = $numberOfRepetition;

        return $this;
    }
}