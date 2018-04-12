<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 12/04/18
 * Time: 18:58
 */

namespace AppBundle\Service;

use AppBundle\Entity\HelpRequest;
use AppBundle\Repository\ProjectRepository;
use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\HttpFoundation\ParameterBag;

class HelpRequestService
{
    private $em;

    private $userManager;

    private $helpRequestRepository;

    private $projectRepository;

    public function __construct(EntityManager $entityManager, UserManager $userManager)
    {
        $this->em = $entityManager;
        $this->userManager = $userManager;
        $this->helpRequestRepository = $entityManager->getRepository('AppBundle:HelpRequest');
        $this->projectRepository = $entityManager->getRepository('AppBundle:Project');
    }

    /**
     * @param ParameterBag $data
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function addHelpRequest(ParameterBag $data)
    {
        $helpRequest = new HelpRequest();
        $helpRequest->setDate(new \DateTime());
        $helpRequest->setDescription($data->get('description'));
        $helpRequest->setTitle($data->get('title'));
        $helpRequest->setProjectId($this->projectRepository->find($data->get('projectId')));

        foreach ($data->get('usersRequested') as $userId) {
            $helpRequest->addUsersRequested($this->userManager->findUserBy(['id' => $userId]));
        }

        $this->em->persist($helpRequest);
        $this->em->flush();
    }

    /**
     * @param $id
     * @throws \Doctrine\ORM\ORMException
     */
    public function deleteHelpRequest($id)
    {
        $helpRequest = $this->helpRequestRepository->find($id);
        $this->em->remove($helpRequest);
    }

    public function getAll()
    {
        return $this->helpRequestRepository->findAll();
    }

    public function getByProjectId($projectId)
    {
        return $this->helpRequestRepository->findBy(['projectId' => $projectId]);
    }

    public function getByUserRequestedId($userRequestedId)
    {
        return $this->helpRequestRepository->findBy(['usersRequested' => $userRequestedId]);
    }

    public function getById($id)
    {
        return $this->helpRequestRepository->find($id);
    }

}