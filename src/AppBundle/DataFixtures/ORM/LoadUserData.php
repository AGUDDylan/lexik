<?php

namespace AppBundle\DataFixtures\ORM;



use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\DataFixtures\AbstractFixture;



use AppBundle\Entity\User;



class LoadUserData extends AbstractFixture implements OrderedFixtureInterface

{

    public function load(ObjectManager $manager)

    {

        $datas = [
            [
                'firstName' => 'Jean paul',
                'lastName' => 'Gotier',
                'email' => 'jpolgoth@gmail.com',
                'birthdayDate' => \DateTime::createFromFormat('d-m-Y', '20-02-1970'),
                'group' => $this->getReference('usergroup-0')
            ],
            [
                'firstName' => 'Robert',
                'lastName' => 'Michaud',
                'email' => 'robmichu@msn.com',
                'birthdayDate' => \DateTime::createFromFormat('d-m-Y', '12-06-1970'),
                'group' => $this->getReference('usergroup-0')
            ],
            [
                'firstName' => 'Maxime',
                'lastName' => 'ruello',
                'email' => 'maxlamenacedu13@outlook.fr',
                'birthdayDate' => \DateTime::createFromFormat('d-m-Y', '25-04-1990'),
                'group' => $this->getReference('usergroup-1')
            ],
            [
                'firstName' => 'Kevin',
                'lastName' => 'Brossar',
                'email' => 'safari26@gmail.com',
                'birthdayDate' => \DateTime::createFromFormat('d-m-Y', '25-04-1995'),
                'group' => $this->getReference('usergroup-1')
            ],

            [
                'firstName' => 'Merlin',
                'lastName' => 'enchanteur',
                'email' => 'broceliande@gmail.com',
                'birthdayDate' => \DateTime::createFromFormat('d-m-Y', '25-12-1963'),
                'group' => $this->getReference('usergroup-2')
            ],

            [
                'firstName' => 'Gaunter',
                'lastName' => 'O Din',
                'email' => 'god@gmail.com',
                'birthdayDate' => \DateTime::createFromFormat('d-m-Y', '01-01-1000'),
                'group' => $this->getReference('usergroup-2')
            ],
        ];
        foreach ($datas as $i => $data) {
            $user = new User();
            $user->setFirstName($data['firstName']);
            $user->setLastName($data['lastName']);
            $user->setEmail($data['email']);
            $user->setBirthdayDate($data['birthdayDate']);
            $user->setGroup($data['group']);
            $manager->persist($user);
        }
        $manager->flush();

    }





    public function getOrder()

    {

        return 6;

    }

}