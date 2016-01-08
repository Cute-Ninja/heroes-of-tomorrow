<?php

namespace CuteNinja\HOT\CharacterBundle\Controller;

use CuteNinja\HOT\UserBundle\Repository\UserRepository;
use CuteNinja\ParabolaBundle\Controller\APIBaseController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CharacterController
 *
 * @package CuteNinja\HOT\CharacterBundle\Controller
 */
class CharacterController extends APIBaseController
{
    /**
     * {@inheritdoc}
     */
    public function listAction(Request $request)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

    /**
     * {@inheritdoc}
     */
    public function getAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

    /**
     * {@inheritdoc}
     */
    public function postAction(Request $request)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

    /**
     * {@inheritdoc}
     */
    public function putAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

    /**
     * {@inheritdoc}
     */
    public function deleteAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

}
