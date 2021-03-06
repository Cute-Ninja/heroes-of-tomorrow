<?php

namespace CuteNinja\HOT\CharacterBundle\Tests\Context;

use Behat\Gherkin\Node\TableNode;
use CuteNinja\HOT\UserBundle\Tests\Context\BaseContext;

/**
 * Class CharacterContext
 *
 * @package CuteNinja\HOT\CharacterBundle\Tests\Context
 */
class CharacterContext extends BaseContext
{
    const CHARACTER_ID_NOT_EXISTING = 1337;
    const API_NAME                  = 'characters';

    /**
     * @When I want to list all Characters
     */
    public function iWantToListAllCharacters()
    {
        $this->iWantToList(self::API_NAME);
    }

    /**
     * @When I want to see the details of the Character named :name
     *
     * @param string $name
     */
    public function iWantToSeeTheDetailsOfTheCharacterNamed($name)
    {
        $this->iWantToSeeTheDetails(self::API_NAME, $this->getCharacterIdForTest($name));
    }

    /**
     * @When I want to add a new Character
     * @When I want to add a new Character with the following values
     *
     * @param TableNode|null $table
     */
    public function iWantToCreateACharacter(TableNode $table = null)
    {
        $this->iWantToCreate(self::API_NAME, $this->getFormData($table));
    }

    /**
     * @When I want to edit the Character named :name
     * @When I want to edit the Character named :name with the following values
     *
     * @param string         $name
     * @param TableNode|null $table
     */
    public function iWantToEditTheCharacterNamed($name, TableNode $table = null)
    {
        $this->iWantToEdit(self::API_NAME, $this->getCharacterIdForTest($name), $this->getFormData($table));
    }

    /**
     * @When I want to delete the Character named :name
     *
     * @param string $name
     */
    public function iWantToDeleteTheCharacterNamed($name)
    {
        $this->iWantToDelete(self::API_NAME, $this->getCharacterIdForTest($name));
    }

    /**
     * @param string $name
     *
     * @return int
     */
    private function getCharacterIdForTest($name)
    {
        $character = $this->getRepository('CuteNinjaHOTCharacterBundle:Character')->findOneBy(array('name' => $name));

        return $character ? $character->getId() : self::CHARACTER_ID_NOT_EXISTING;
    }
}