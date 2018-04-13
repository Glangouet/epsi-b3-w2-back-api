<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/04/18
 * Time: 20:31
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;


class UserController extends FOSRestController
{
    /**
     *
     * @Rest\Post(
     *      path = "/user/get-by-role",
     *      options = { "expose" = true },
     *      name = "api_get_by_roles"
     * )
     *
     */
    public function getUsersByRoleAction(Request $request)
    {
        $roles = $request->get('roles');
        $userService = $this->get('api.user_service');

        return $userService->getAllUsersByRoles($roles);

    }

    /**
     *
     * @Rest\Post(
     *      path = "/user/update",
     *      options = { "expose" = true },
     *      name = "api_user_update"
     * )
     *
     */
    public function updateUser(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $skillRepo = $em->getRepository('AppBundle:Skill');
        $data = $request->request;
        $userManager = $this->get('fos_user.user_manager');
        /** @var UserInterface|User $user */
        $user = $userManager->findUserBy(['id' => $request->get('id')]);
        foreach ($data->get('skills') as $skill) {
            $skillObj = $skillRepo->find($skill['id']);
            $user->addSkill($skillObj);
        }

        $userManager->updateUser($user);
    }

    /**
     *
     * @Rest\Get(
     *      path = "/user/get-by-id/{id}",
     *      options = { "expose" = true },
     *      name = "api_user_get_by_id"
     * )
     *
     */
    public function getById($id)
    {
        $userManager = $this->get('fos_user.user_manager');

        return $userManager->findUserBy(['id' => $id]);
    }

}