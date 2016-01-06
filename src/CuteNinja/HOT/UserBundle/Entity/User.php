<?php

namespace CuteNinja\HOT\UserBundle\Entity;

use CuteNinja\PersonaBundle\Entity\AbstractUser as PersonaUser;

/**
 * Class User
 *
 * @package CuteNinja\UserBundle\Entity
 */
class User extends PersonaUser
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string $username
     */
    protected $username;

    /**
     * @var \DateTime $createdAt
     */
    protected $createdAt;

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
}