<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/04/18
 * Time: 20:31
 */

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends FOSRestController
{
    /**
     *
     * @Rest\Get(
     *      path = "/project/get-all",
     *      options = { "expose" = true },
     *      name = "api_project_get_all"
     * )
     *
     */
    public function getAllProjectAction()
    {
        $projectService = $this->get('api.project_service');

        return $projectService->getAllProject();
    }

    /**
     * @param Request $request
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Rest\Post(
     *      path = "/project/add",
     *      options = { "expose" = true },
     *      name = "api_project_add"
     * )
     *
     */
    public function addProjectAction(Request $request)
    {
        $projectService = $this->get('api.project_service');

        return $projectService->addProject($request->request);
    }

    /**
     * @param $id
     * @return \AppBundle\Entity\Project|null|object
     *
     * @Rest\Get(
     *      path = "/project/get-by-id/{id}",
     *      options = { "expose" = true },
     *      name = "api_project_get_by_id"
     * )
     *
     */
    public function getProjectByIdAction($id)
    {
        $projectService = $this->get('api.project_service');

        return $projectService->getById($id);
    }
}