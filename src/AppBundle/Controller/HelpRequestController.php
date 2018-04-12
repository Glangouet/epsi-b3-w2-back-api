<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 12/04/18
 * Time: 18:58
 */

namespace AppBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;

class HelpRequestController extends FOSRestController
{

    /**
     * @param Request $request
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @Rest\Post(
     *      path = "/help-request/add",
     *      options = { "expose" = true },
     *      name = "api_help_request_add"
     * )
     *
     */
    public function addHelpRequestAction(Request $request)
    {
        $helpRequestService = $this->get('api.help_request_service');
        $helpRequestService->addHelpRequest($request->request);
    }

    /**
     * @param $id
     * @throws \Doctrine\ORM\ORMException
     *
     * @Rest\Delete(
     *      path = "/help-request/delete/{id}",
     *      options = { "expose" = true },
     *      name = "api_help_request_delete"
     * )
     *
     */
    public function deleteHelpRequestAction($id)
    {
        $helpRequestService = $this->get('api.help_request_service');
        $helpRequestService->deleteHelpRequest($id);
    }

    /**
     * @return \AppBundle\Entity\HelpRequest[]|array
     *
     * @Rest\Get(
     *      path = "/help-request/get-all",
     *      options = { "expose" = true },
     *      name = "api_help_request_get_all"
     * )
     *
     */
    public function getAllAction()
    {
        $helpRequestService = $this->get('api.help_request_service');

        return $helpRequestService->getAll();
    }

    /**
     * @param $projectId
     * @return \AppBundle\Entity\HelpRequest[]|array
     *
     * @Rest\Get(
     *      path = "/help-request/get-by-project/{id}",
     *      options = { "expose" = true },
     *      name = "api_help_request_get_by_project"
     * )
     *
     */
    public function getByProjectIdAction($projectId)
    {
        $helpRequestService = $this->get('api.help_request_service');

        return $helpRequestService->getByProjectId($projectId);
    }

    /**
     * @param $id
     * @return \AppBundle\Entity\HelpRequest[]|array
     *
     * @Rest\Get(
     *      path = "/help-request/get-by-user-requested/{id}",
     *      options = { "expose" = true },
     *      name = "api_help_request_get_by_requested_id"
     * )
     *
     */
    public function getByUserRequestedIdAction($id)
    {
        $helpRequestService = $this->get('api.help_request_service');

        return $helpRequestService->getByUserRequestedId($id);
    }

    /**
     * @param $id
     * @return \AppBundle\Entity\HelpRequest[]|array
     *
     * @Rest\Get(
     *      path = "/help-request/get/{id}",
     *      options = { "expose" = true },
     *      name = "api_help_request_get_by_id"
     * )
     *
     */
    public function getByid($id)
    {
        $helpRequestService = $this->get('api.help_request_service');

        return $helpRequestService->getById($id);
    }
}