<?php

namespace CuteNinja\HOT\UserBundle\Tests\Context;

/**
 * Class UserContext
 *
 * @package CuteNinja\HOT\UserBundle\Tests\Context
 */
class UserContext extends BaseContext
{
    const USER_ID_NOT_EXISTING = 1337;
    const API_NAME                  = 'users';

    /**
     * @When I want to list all Users
     */
    public function iWantToListAllUsers()
    {
        $this->iWantToList(self::API_NAME);
    }

    /**
     * @When I want to see the details of the User named :name
     *
     * @param string $name
     */
    public function iWantToSeeTheDetailsOfTheUserNamed($name)
    {
        $this->iWantToSeeTheDetails(self::API_NAME, $this->getUserIdForTest($name));
    }

    /**
     * @When I want to add a new User
     */
    public function iWantToCreateAnUser()
    {
        $this->iWantToCreate(self::API_NAME);
    }

    /**
     * @When I want to edit the User named :username
     *
     * @param string $username
     */
    public function iWantToEditTheUserNamed($username)
    {
        $this->iWantToEdit(self::API_NAME, $this->getUserIdForTest($username));
    }

    /**
     * @When I want to delete the User named :username
     *
     * @param string $username
     */
    public function iWantToDeleteTheUserNamed($username)
    {
        $this->iWantToDelete(self::API_NAME, $this->getUserIdForTest($username));
    }

    /**
     * @param string $username
     *
     * @return int
     */
    private function getUserIdForTest($username)
    {
        $user = $this->getRepository('CuteNinjaHOTUserBundle:User')->findOneBy(array('username' => $username));

        return $user ? $user->getId() : self::USER_ID_NOT_EXISTING;
    }
}