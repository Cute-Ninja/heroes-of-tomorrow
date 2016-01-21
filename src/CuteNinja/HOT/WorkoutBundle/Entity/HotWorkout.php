<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

/**
 * Class HotWorkout
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
class HotWorkout extends AbstractWorkout
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var integer $difficulty
     */
    protected $difficulty = self::DEFAULT_DIFFICULTY;

    /**
     * @var AbstractWorkoutStep[] $workoutSteps
     */
    protected $workoutSteps;

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return self::TYPE_HOT;
    }
}