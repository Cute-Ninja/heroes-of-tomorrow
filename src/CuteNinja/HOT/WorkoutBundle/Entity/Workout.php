<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

use CuteNinja\MemoriaBundle\Entity\BaseEntity;

/**
 * Class Workout
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
class Workout extends BaseEntity
{
    /**
     * @var integer
     */
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
}