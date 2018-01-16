<?php

namespace AppBundle\DataFixtures\ORM;



use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Doctrine\Common\DataFixtures\AbstractFixture;



use AppBundle\Entity\UserGroup;



class LoadUserGroup extends AbstractFixture implements OrderedFixtureInterface

{

    public function load(ObjectManager $manager)

    {

        $datas = [
            [
                'name' => 'Membre',
            ],
            [
                'name' => 'Modérateur',
            ],
            [
                'name' => 'Administrateur',
            ],
        ];
        foreach ($datas as $i => $data) {
            $userGroup = new UserGroup();
            $userGroup->setName($data['name']);
            $manager->persist($userGroup);
            $this->addReference('usergroup-'.$i, $userGroup);
        }
        $manager->flush();

    }



    public function getOrder()

    {

        return 5;

    }

}