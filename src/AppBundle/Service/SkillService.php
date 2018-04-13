<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 12/04/18
 * Time: 18:58
 */

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserManager;

class SkillService
{
    private $em;

    private $userManager;

    private $skillRepository;
    
    public function __construct(EntityManager $entityManager, UserManager $userManager)
    {
        $this->em = $entityManager;
        $this->userManager = $userManager;
        $this->skillRepository = $entityManager->getRepository('AppBundle:Skill');
    }

    public function getAll()
    {
        return $this->skillRepository->findAll();
    }

}