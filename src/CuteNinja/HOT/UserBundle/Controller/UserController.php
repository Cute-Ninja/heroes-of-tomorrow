<?php

namespace CuteNinja\HOT\UserBundle\Controller;

use CuteNinja\HOT\UserBundle\Entity\User;
use CuteNinja\HOT\UserBundle\Form\Type\UserType;
use CuteNinja\HOT\UserBundle\Repository\UserRepository;
use CuteNinja\ParabolaBundle\Controller\APIBaseController;
use FOS\RestBundle\Controller\Annotations\View;
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
        $query                 = $userRepository->getForListActionQueryBuilder();

        $page  = $this->getPageForPagination($request);
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
     *              "description"="User ID"
     *          }
     *      }
     * )
     *
     * @View(serializerEnableMaxDepthChecks=true)
     */
    public function getAction(Request $request, $id)
    {
        $user = $this->getDoctrine()->getRepository('CuteNinjaHOTUserBundle:User')->find($id);

        $serializationContexts = ['common', 'referrer'];

        return $this->getSuccessResponseBuilder()->buildSingleObjectResponse($user, $serializationContexts);
    }

    /**
     * {@inheritdoc}
     *
     * @ApiDoc(
     *      section="User",
     *      description="Register a new User",
     *      requirements={
     *          {"name"="email", "required"=true, "dataType"="string", "description"="Email of the User"},
     *          {"name"="username", "required"=true, "dataType"="string", "description"="Username used to login (must be unique on the platform)"},
     *          {"name"="password", "required"=true, "dataType"="string", "description"="Password used to login"},
     *      }
     * )
     */
    public function postAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user, ['method' => 'POST']);

        $form->handleRequest($request);
        if (!$form->isValid()) {
            return $this->getClientErrorResponseBuilder()->jsonResponseFormError($form);
        }

        $password = $this->get('security.password_encoder')->encodePassword($user, $form->get('password')->getData());
        $user->setPassword($password);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($user);
        $manager->flush();

        return $this->getSuccessResponseBuilder()->postSuccess();
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
    public function putAction(Request $request, $id)
    {
        /** @var User $user */
        $user = $this->getDoctrine()->getRepository('CuteNinjaHOTUserBundle:User')->find($id);
        if (!$user) {
            return $this->getClientErrorResponseBuilder()->notFound();
        }
        if ($user->getId() != $this->getUser()->getId()) {
            return $this->getClientErrorResponseBuilder()->forbidden();
        }

        $form = $this->createForm(new UserType(), $user, ['method' => 'PUT']);

        $form->handleRequest($request);
        if (!$form->isValid()) {
            return $this->getClientErrorResponseBuilder()->jsonResponseFormError($form);
        }

        if($newPassword = $form->get('password')->getData()) {
            $password = $this->get('security.password_encoder')->encodePassword($user, $form->get('password')->getData());
            $user->setPassword($password);
        }

        $this->getDoctrine()->getManager()->flush();

        return $this->getSuccessResponseBuilder()->putSuccess();
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
