<?php


namespace AppBundle\Manager;


use AppBundle\Entity\UserGroup;
use Doctrine\ORM\EntityManagerInterface;


class UserGroupManager

{
    private $manager;
    /**
     * UserGroupManager constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    /**
     * @return UserGroup[]array
     */
    public function getAllGroups()
    {
        return $this->manager->getRepository(UserGroup::class)->findAll();
    }


}