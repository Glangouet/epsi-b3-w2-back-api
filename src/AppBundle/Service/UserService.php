<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 12/04/2018
 * Time: 09:52
 */

namespace AppBundle\Service;


use Doctrine\ORM\EntityManager;

class UserService
{
    private $em;

    private $userRepository;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->userRepository = $em->getRepository('AppBundle:User');
    }

    /**
     * @param $roles
     * @return mixed
     */
    public function getAllUsersByRoles($role = null) {

        $query = $this->userRepository->createQueryBuilder('u');

        if ($role !== null) {
            $query
                ->where('u.roles LIKE :role')
                ->setParameter('role', '%'.$role.'%');
        }

        return $query->getQuery()->getResult();
    }
}