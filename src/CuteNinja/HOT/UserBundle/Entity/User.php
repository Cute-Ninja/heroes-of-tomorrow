<?php

namespace CuteNinja\HOT\UserBundle\Entity;

use CuteNinja\HOT\CharacterBundle\Entity\Character;
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
     * @var Character $character
     */
    protected $character;

    /**
     * @var User $referrer
     */
    protected $referrer;

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
     * @return Character
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @param Character $character
     *
     * @return $this
     */
    public function setCharacter($character)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * @return User
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * @param User $referrer
     *
     * @return $this
     */
    public function setReferrer($referrer)
    {
        $this->referrer = $referrer;

        return $this;
    }
}