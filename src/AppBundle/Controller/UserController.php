<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/04/18
 * Time: 20:31
 */

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
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

}