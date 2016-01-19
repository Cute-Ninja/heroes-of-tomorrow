<?php

namespace CuteNinja\HOT\WorkoutBundle\Tests\Context;

use CuteNinja\HOT\UserBundle\Tests\Context\BaseContext;

/**
 * Class ExerciseContext
 *
 * @package CuteNinja\HOT\WorkoutBundle\Tests\Context
 */
class ExerciseContext extends BaseContext
{
    const EXERCISE_ID_NOT_EXISTING = 1337;
    const API_NAME                 = 'exercises';

    /**
     * @When I want to list all Exercises
     */
    public function iWantToListAllExercises()
    {
        $this->iWantToList(self::API_NAME);
    }

    /**
     * @When I want to see the details of the Exercise named :name
     *
     * @param string $name
     */
    public function iWantToSeeTheDetailsOfTheExerciseNamed($name)
    {
        $this->iWantToSeeTheDetails(self::API_NAME, $this->getExerciseIdForTest($name));
    }

    /**
     * @When I want to add a new Exercise
     */
    public function iWantToCreateAnExercise()
    {
        $this->iWantToCreate(self::API_NAME);
    }

    /**
     * @When I want to edit the Exercise named :name
     *
     * @param string $name
     */
    public function iWantToEditTheExerciseNamed($name)
    {
        $this->iWantToEdit(self::API_NAME, $this->getExerciseIdForTest($name));
    }

    /**
     * @When I want to delete the Exercise named :name
     *
     * @param string $name
     */
    public function iWantToDeleteTheExerciseNamed($name)
    {
        $this->iWantToDelete(self::API_NAME, $this->getExerciseIdForTest($name));
    }

    /**
     * @param string $name
     *
     * @return int
     */
    private function getExerciseIdForTest($name)
    {
        $exercise = $this->getRepository('CuteNinjaHOTWorkoutBundle:Exercise')->findOneBy(array('name' => $name));

        return $exercise ? $exercise->getId() : self::EXERCISE_ID_NOT_EXISTING;
    }
}