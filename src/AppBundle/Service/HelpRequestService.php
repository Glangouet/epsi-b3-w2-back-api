<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 12/04/18
 * Time: 18:58
 */

namespace AppBundle\Service;

use AppBundle\Entity\HelpRequest;
use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\HttpFoundation\ParameterBag;

class HelpRequestService
{
    private $em;

    private $userManager;

    private $helpRequestRepository;

    public function __construct(EntityManager $entityManager, UserManager $userManager)
    {
        $this->em = $entityManager;
        $this->userManager = $userManager;
        $this->helpRequestRepository = $entityManager->getRepository('AppBundle:HelpRequest');
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
        $helpRequest->setProjectId($data->get('projectId'));

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