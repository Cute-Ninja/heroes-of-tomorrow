<?php

namespace CuteNinja\HOT\WorkoutBundle\Tests\Context;

use CuteNinja\HOT\UserBundle\Tests\Context\BaseContext;

/**
 * Class EquipmentContext
 *
 * @package CuteNinja\HOT\WorkoutBundle\Tests\Context
 */
class EquipmentContext extends BaseContext
{
    const EQUIPMENT_ID_NOT_EXISTING = 1337;
    const API_NAME                  = 'equipments';

    /**
     * @When I want to list all Equipments
     */
    public function iWantToListAllEquipments()
    {
        $this->iWantToList(self::API_NAME);
    }

    /**
     * @When I want to see the details of the Equipment named :name
     *
     * @param string $name
     */
    public function iWantToSeeTheDetailsOfTheEquipmentNamed($name)
    {
        $this->iWantToSeeTheDetails(self::API_NAME, $this->getEquipmentIdForTest($name));
    }

    /**
     * @When I want to add a new Equipment
     */
    public function iWantToCreateAnEquipment()
    {
        $this->iWantToCreate(self::API_NAME);
    }

    /**
     * @When I want to edit the Equipment named :name
     *
     * @param string $name
     */
    public function iWantToEditTheEquipmentNamed($name)
    {
        $this->iWantToEdit(self::API_NAME, $this->getEquipmentIdForTest($name));
    }

    /**
     * @When I want to delete the Equipment named :name
     *
     * @param string $name
     */
    public function iWantToDeleteTheEquipmentNamed($name)
    {
        $this->iWantToDelete(self::API_NAME, $this->getEquipmentIdForTest($name));
    }

    /**
     * @param string $name
     *
     * @return int
     */
    private function getEquipmentIdForTest($name)
    {
        $equipment = $this->getRepository('CuteNinjaHOTWorkoutBundle:Equipment')->findOneBy(array('name' => $name));

        return $equipment ? $equipment->getId() : self::EQUIPMENT_ID_NOT_EXISTING;
    }
}