<?php

namespace CuteNinja\HOT\WorkoutBundle\Controller;

use CuteNinja\HOT\WorkoutBundle\Repository\EquipmentRepository;
use CuteNinja\ParabolaBundle\Controller\APIBaseController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EquipmentController
 *
 * @package CuteNinja\HOT\WorkoutBundle\Controller
 */
class EquipmentController extends APIBaseController
{
    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Equipment",
     *      description="Get the list of Equipments"
     * )
     */
    public function listAction(Request $request)
    {
        /** @var EquipmentRepository $equipmentRepository */
        $equipmentRepository = $this->getDoctrine()->getRepository('CuteNinjaHOTWorkoutBundle:Equipment');

        $serializationContexts = ['common', 'shopping'];
        $query                 = $equipmentRepository->getForListActionQueryBuilder();

        $page  = $this->getPageForPagination($request);
        $limit = $this->getLimitForPagination($request);

        $paginator = $this->getPaginator()->paginate($query, $page, $limit);

        return $this->getSuccessResponseBuilder()->buildMultiObjectResponse($paginator, $request, $this->getRouter(), $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Equipment",
     *      description="Get the details of a Equipment based on his ID",
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
        $equipment = $this->getDoctrine()->getRepository('CuteNinjaHOTWorkoutBundle:Equipment')->find($id);

        $serializationContexts = ['common', 'shopping'];

        return $this->getSuccessResponseBuilder()->buildSingleObjectResponse($equipment, $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Equipment",
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
     *      section="Equipment",
     *      description="NOT IMPLEMENTED",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="Equipment ID"
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
     *      section="Equipment",
     *      description="NOT IMPLEMENTED",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="Equipment ID"
     *          }
     *      }
     * )
     */
    public function deleteAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

}
