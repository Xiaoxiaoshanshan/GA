<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Type;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $type = new Type();
        $type ->setlibelle('peinture');

        $type1 = new Type();
        $type1->setlibelle('sculpture');

        $type2 = new Type();
        $type2->setlibelle('media');

        $manager->persist($type);
        $manager->persist($type1);
        $manager->persist($type2);
        $manager->flush();
    }
}
