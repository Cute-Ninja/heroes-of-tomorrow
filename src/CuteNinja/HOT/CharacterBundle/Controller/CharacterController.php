<?php

namespace CuteNinja\HOT\CharacterBundle\Controller;

use CuteNinja\HOT\CharacterBundle\Repository\CharacterRepository;
use CuteNinja\ParabolaBundle\Controller\APIBaseController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
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
     *
     * @ApiDoc(
     *      section="Character",
     *      description="Get the list of Characters"
     * )
     */
    public function listAction(Request $request)
    {
        /** @var CharacterRepository $characterRepository */
        $characterRepository = $this->getDoctrine()->getRepository('CuteNinjaHOTCharacterBundle:Character');

        $serializationContexts = ['common'];
        $query                 = $characterRepository->getForListActionQueryBuilder();

        $page  = $this->getPageForPagination($request);
        $limit = $this->getLimitForPagination($request);

        $paginator = $this->getPaginator()->paginate($query, $page, $limit);

        return $this->getSuccessResponseBuilder()->buildMultiObjectResponse($paginator, $request, $this->getRouter(), $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Character",
     *      description="Get the details of a Character based on his ID",
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
        $character = $this->getDoctrine()->getRepository('CuteNinjaHOTCharacterBundle:Character')->find($id);

        $serializationContexts = ['common'];

        return $this->getSuccessResponseBuilder()->buildSingleObjectResponse($character, $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Character",
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
     * @ApiDoc(
     *      section="Character",
     *      description="NOT IMPLEMENTED",
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
    public function putAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Character",
     *      description="NOT IMPLEMENTED",
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
    public function deleteAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }
}
