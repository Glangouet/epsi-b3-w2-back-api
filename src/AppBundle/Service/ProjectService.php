<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 12/04/2018
 * Time: 09:52
 */

namespace AppBundle\Service;


use AppBundle\Entity\Project;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\HttpFoundation\ParameterBag;

class ProjectService
{
    private $em;

    private $projectRepository;

    private $userManager;

    public function __construct(EntityManager $em, UserManager $userManager)
    {
        $this->em = $em;
        $this->projectRepository = $em->getRepository('AppBundle:Project');
        $this->userManager = $userManager;
    }


    public function getAllProject()
    {
        return $this->projectRepository->findAll();
    }

    /**
     * @param ParameterBag $data
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function addProject(ParameterBag $data)
    {
        $project = new Project();
        $project->setCreationDate(new \DateTime());
        $project->setStartDate(new \DateTime());
        $project->setEndDate(new \DateTime());
        $project->setName($data->get('name'));
        $project->setDescription($data->get('description'));
        foreach ($data->get('partners') as $partnerId) {
            $project->addPartner($this->userManager->findUserBy(['id' => $partnerId]));
        }

        $this->em->persist($project);
        $this->em->flush();
    }

    /**
     * @param $id
     * @return Project|null|object
     */
    public function getById($id)
    {
        return $this->projectRepository->find($id);
    }

    /**
     * @param ParameterBag $data
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateProject(ParameterBag $data)
    {
        $project = $this->projectRepository->find($data->get('id'));
        $project->setStartDate(new \DateTime($data->get('dateStart')));
        $project->setEndDate(new \DateTime($data->get('dateEnd')));
        $project->setName($data->get('name'));
        $project->setDescription($data->get('description'));
        foreach ($data->get('partners') as $partnerId) {
            $partner = $this->userManager->findUserBy(['id' => $partnerId]);
            /** @var Collection $partners */
            $partners = $project->getPartners();
            if (!$partners->contains($partner)) {
                $project->addPartner($partner);
            }
        }

        $this->em->flush();
    }
}