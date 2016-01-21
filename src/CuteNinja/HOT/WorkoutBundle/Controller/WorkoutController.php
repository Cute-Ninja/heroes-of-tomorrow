<?php

namespace CuteNinja\HOT\WorkoutBundle\Controller;

use CuteNinja\HOT\WorkoutBundle\Repository\WorkoutRepository;
use CuteNinja\ParabolaBundle\Controller\APIBaseController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class WorkoutController
 *
 * @package CuteNinja\HOT\WorkoutBundle\Controller
 */
class WorkoutController extends APIBaseController
{
    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Workout",
     *      description="Get the list of Workouts"
     * )
     */
    public function listAction(Request $request)
    {
        /** @var WorkoutRepository $workoutRepository */
        $workoutRepository = $this->getDoctrine()->getRepository('CuteNinjaHOTWorkoutBundle:AbstractWorkout');

        $serializationContexts = ['common'];
        $query                 = $workoutRepository->getForListActionQueryBuilder($this->getUser()->getId());

        $page  = $this->getPageForPagination($request);
        $limit = $this->getLimitForPagination($request);

        $paginator = $this->getPaginator()->paginate($query, $page, $limit);

        return $this->getSuccessResponseBuilder()->buildMultiObjectResponse($paginator, $request, $this->getRouter(), $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Workout",
     *      description="Get the details of a Workout based on his ID",
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
        /** @var WorkoutRepository $workoutRepository */
        $workoutRepository = $this->getDoctrine()->getRepository('CuteNinjaHOTWorkoutBundle:AbstractWorkout');
        $workout           = $workoutRepository->getForGetAction($id);

        $serializationContexts = ['common', 'workout-details'];

        return $this->getSuccessResponseBuilder()->buildSingleObjectResponse($workout, $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="Workout",
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
     *      section="Workout",
     *      description="NOT IMPLEMENTED",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="Workout ID"
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
     *      section="Workout",
     *      description="NOT IMPLEMENTED",
     *      requirements={
     *          {
     *              "name"="id",
     *              "dataType"="integer",
     *              "requirement"="\d+",
     *              "description"="Workout ID"
     *          }
     *      }
     * )
     */
    public function deleteAction(Request $request, $id)
    {
        return $this->getServerErrorResponseBuilder()->notImplemented();
    }

}
