<?php

namespace CuteNinja\HOT\WorkoutBundle\Controller;

use CuteNinja\HOT\WorkoutBundle\Repository\ExerciseRepository;
use CuteNinja\ParabolaBundle\Controller\APIBaseController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ExerciseController
 *
 * @package CuteNinja\HOT\WorkoutBundle\Controller
 */
class ExerciseController extends APIBaseController
{
    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Exercise",
     *      description="Get the list of Exercises"
     * )
     */
    public function listAction(Request $request)
    {
        /** @var ExerciseRepository $exerciseRepository */
        $exerciseRepository = $this->getDoctrine()->getRepository('CuteNinjaHOTWorkoutBundle:Exercise');

        $serializationContexts = ['common'];
        $query                 = $exerciseRepository->getForListActionQueryBuilder();

        $page  = $this->getPageForPagination($request);
        $limit = $this->getLimitForPagination($request);

        $paginator = $this->getPaginator()->paginate($query, $page, $limit);

        return $this->getSuccessResponseBuilder()->buildMultiObjectResponse($paginator, $request, $this->getRouter(), $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Exercise",
     *      description="Get the details of a Exercise based on his ID",
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
        $exercise = $this->getDoctrine()->getRepository('CuteNinjaHOTWorkoutBundle:Exercise')->find($id);

        $serializationContexts = ['common', 'equipment'];

        return $this->getSuccessResponseBuilder()->buildSingleObjectResponse($exercise, $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Exercise",
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
     *      section="Exercise",
     *      description="NOT IMPLEMENTED",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="Exercise ID"
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
     *      section="Exercise",
     *      description="NOT IMPLEMENTED",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="Exercise ID"
     *          }
     *      }
     * )
     */
    public function deleteAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

}
