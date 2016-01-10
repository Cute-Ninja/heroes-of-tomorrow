<?php

namespace CuteNinja\HOT\UserBundle\Controller;

use CuteNinja\HOT\UserBundle\Repository\UserRepository;
use CuteNinja\ParabolaBundle\Controller\APIBaseController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController
 *
 * @package CuteNinja\HOT\UserBundle\Controller
 */
class UserController extends APIBaseController
{
    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="User",
     *      description="Get the list of Users"
     * )
     */
    public function listAction(Request $request)
    {
        /** @var UserRepository $userRepository */
        $userRepository = $this->getDoctrine()->getRepository('CuteNinjaHOTUserBundle:User');

        $serializationContexts = ['common'];
        $query = $userRepository->getForListActionQueryBuilder();

        $page = $this->getPageForPagination($request);
        $limit = $this->getLimitForPagination($request);

        $paginator = $this->getPaginator()->paginate($query, $page, $limit);

        return $this->getSuccessResponseBuilder()->buildMultiObjectResponse($paginator, $request, $this->getRouter(), $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="User",
     *      description="Get the details of a User based on his ID",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="Character ID"
     *          }
     *      }
     * )
     */
    public function getAction(Request $request, $id)
    {
        $user = $this->getDoctrine()->getRepository('CuteNinjaHOTUserBundle:User')->find($id);

        $serializationContexts = ['common'];

        return $this->getSuccessResponseBuilder()->buildSingleObjectResponse($user, $serializationContexts);

    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="User",
     *      description="NOT IMPLEMENTED"
     * )
     */
    public function postAction(Request $request)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

    /**
     * {@inheritdoc}
     *
     * ApiDoc(
     *      section="User",
     *      description="NOT IMPLEMENTED",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="User ID"
     *          }
     *      }
     * )
     */
    public function putAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="User",
     *      description="NOT IMPLEMENTED",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="User ID"
     *          }
     *      }
     * )
     */
    public function deleteAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

}
