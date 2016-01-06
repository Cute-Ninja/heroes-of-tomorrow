<?php

namespace CuteNinja\HOT\UserBundle\Controller;

use CuteNinja\HOT\UserBundle\Repository\UserRepository;
use CuteNinja\ParabolaBundle\Controller\APIBaseController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 *
 * @package CuteNinja\HOT\UserBundle\Controller
 */
class UserController extends APIBaseController
{
    /**
     * {@inheritdoc}
     */
    public function listAction(Request $request)
    {
        /** @var UserRepository $userRepository */
        $userRepository = $this->getDoctrine()->getRepository('CuteNinjaHOTUserBundle:User');

        $serializationContexts = ['common', 'user-lists'];
        $query                 = $userRepository->getForListActionQueryBuilder();

        $page  = $this->getPageForPagination($request);
        $limit = $this->getLimitForPagination($request);

        $paginator = $this->getPaginator()->paginate($query, $page, $limit);

        return $this->getSuccessResponseBuilder()->buildMultiObjectResponse($paginator, $request, $this->getRouter(), $serializationContexts);
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
