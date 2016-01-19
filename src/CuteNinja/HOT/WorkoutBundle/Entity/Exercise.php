<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

use CuteNinja\MemoriaBundle\Entity\BaseEntity;

/**
 * Class Exercise
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
class Exercise extends BaseEntity
{
    const DEFAULT_DIFFICULTY = 0;

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var Equipment[] $equipments
     */
    protected $equipments;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var integer
     */
    protected $difficulty = self::DEFAULT_DIFFICULTY;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Equipment[]
     */
    public function getEquipments()
    {
        return $this->equipments;
    }

    /**
     * @param Equipment[] $equipments
     *
     * @return $this
     */
    public function setEquipments($equipments)
    {
        $this->equipments = $equipments;

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