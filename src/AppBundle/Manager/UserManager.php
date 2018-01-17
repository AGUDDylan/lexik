<?php


namespace AppBundle\Manager;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    private $manager;
    /**
     * UserManager constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }

    public function find($research)
    {
        return $this->manager->getRepository(User::class)->findByName($research);
    }
}