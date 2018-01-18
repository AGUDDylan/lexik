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

    /**
     * @param $id
     * @return User|null|object
     */
    public function findById($id)
    {
        return $this->manager->getRepository(User::class)->find($id);
    }
    /**
     * @return User[]|array
     */

    /**
     * @return User
     */
    public function create()
    {
        return new User();
    }

    /**
     * @param User $user
     */
    public function save(User $user)
    {
        if($user->getId() === null){
            $this->manager->persist($user);
        }
        $this->manager->flush();
    }


    /**
     * @param User $user
     */
    public function delete(User $user)
    {
        $this->manager->remove($user);
        $this->manager->flush();
    }
}