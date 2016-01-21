<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

use CuteNinja\MemoriaBundle\Entity\BaseEntity;

/**
 * Class AbstractWorkout
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
abstract class AbstractWorkout extends BaseEntity
{
    const TYPE_HOT = 'hot';
    const TYPE_COMMUNITY = 'community';

    const DEFAULT_DIFFICULTY = 0;

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
     * @return string
     */
    abstract public function getType();

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param int $difficulty
     *
     * @return $this
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * @return AbstractWorkoutStep
     */
    public function getWorkoutSteps()
    {
        return $this->workoutSteps;
    }

    /**
     * @param AbstractWorkoutStep $workoutSteps
     *
     * @return $this
     */
    public function setWorkoutSteps($workoutSteps)
    {
        $this->workoutSteps = $workoutSteps;

        return $this;
    }
}