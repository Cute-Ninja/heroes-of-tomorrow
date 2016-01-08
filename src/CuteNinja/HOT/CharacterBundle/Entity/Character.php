<?php

namespace CuteNinja\HOT\CharacterBundle\Entity;

use CuteNinja\HOT\UserBundle\Entity\User;
use CuteNinja\MemoriaBundle\Entity\BaseEntity;

/**
 * Class Character
 *
 * @package CuteNinja\HOT\CharacterBundle\Entity
 */
class Character extends BaseEntity
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
     * @var User $user
     */
    protected $user;

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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}