<?php
namespace CuteNinja\HOT\WorkoutBundle\Entity;

use CuteNinja\MemoriaBundle\Entity\BaseEntity;

/**
 * Class Equipment
 *
 * @package HOT\Bundle\WorkoutBundle\Entity
 */
class Equipment extends BaseEntity
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $amazonLink
     */
    protected $amazonLink;

    /**
     * @return mixed
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
     * @return string
     */
    public function getAmazonLink()
    {
        return $this->amazonLink;
    }

    /**
     * @param string $amazonLink
     *
     * @return $this
     */
    public function setAmazonLink($amazonLink)
    {
        $this->amazonLink = $amazonLink;

        return $this;
    }
}