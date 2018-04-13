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

class SkillController extends FOSRestController
{
    /**
     *
     * @Rest\Get(
     *      path = "/skill/get-all",
     *      options = { "expose" = true },
     *      name = "api_skill_get_all"
     * )
     *
     */
    public function getAll()
    {
        $skillService = $this->get('api.skill_services');

        return $skillService->getAll();
    }
}