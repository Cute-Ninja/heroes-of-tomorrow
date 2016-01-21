<?php

namespace CuteNinja\HOT\WorkoutBundle\Entity;

use CuteNinja\HOT\UserBundle\Entity\User;

/**
 * Class CommunityWorkout
 *
 * @package CuteNinja\HOT\WorkoutBundle\Entity
 */
class CommunityWorkout extends AbstractWorkout
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
     * @var float $rating
     */
    protected $rating;

    /**
     * @var User $owner
     */
    protected $owner;

    /**
     * @var bool $isPublic
     */
    protected $isPublic = false;

    /**
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     *
     * @return $this
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     *
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * @param boolean $isPublic
     *
     * @return $this
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return self::TYPE_COMMUNITY;
    }
}