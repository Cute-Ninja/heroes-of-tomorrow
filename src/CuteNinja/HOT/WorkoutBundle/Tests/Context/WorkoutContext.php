<?php

namespace CuteNinja\HOT\WorkoutBundle\Tests\Context;

use CuteNinja\HOT\UserBundle\Tests\Context\BaseContext;

/**
 * Class WorkoutContext
 *
 * @package CuteNinja\HOT\WorkoutBundle\Tests\Context
 */
class WorkoutContext extends BaseContext
{
    const WORKOUT_ID_NOT_EXISTING = 1337;
    const API_NAME                  = 'workouts';

    /**
     * @When I want to list all Workouts
     */
    public function iWantToListAllWorkouts()
    {
        $this->iWantToList(self::API_NAME);
    }

    /**
     * @When I want to see the details of the Workout named :name
     *
     * @param string $name
     */
    public function iWantToSeeTheDetailsOfTheWorkoutNamed($name)
    {
        $this->iWantToSeeTheDetails(self::API_NAME, $this->getWorkoutIdForTest($name));
    }

    /**
     * @When I want to add a new Workout
     */
    public function iWantToCreateAnWorkout()
    {
        $this->iWantToCreate(self::API_NAME);
    }

    /**
     * @When I want to edit the Workout named :name
     *
     * @param string $name
     */
    public function iWantToEditTheWorkoutNamed($name)
    {
        $this->iWantToEdit(self::API_NAME, $this->getWorkoutIdForTest($name));
    }

    /**
     * @When I want to delete the Workout named :name
     *
     * @param string $name
     */
    public function iWantToDeleteTheWorkoutNamed($name)
    {
        $this->iWantToDelete(self::API_NAME, $this->getWorkoutIdForTest($name));
    }

    /**
     * @param string $name
     *
     * @return int
     */
    private function getWorkoutIdForTest($name)
    {
        $workout = $this->getRepository('CuteNinjaHOTWorkoutBundle:Workout')->findOneBy(array('name' => $name));

        return $workout ? $workout->getId() : self::WORKOUT_ID_NOT_EXISTING;
    }
}