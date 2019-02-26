<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Position;

class PositionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $faker = Faker\Factory::create('fr_FR');

        for($i=1;$i<3;$i++) {
            
            $position = new Position();
            $position->setlibelleposition('A'.$i);            
            $manager->persist($position);
        }

        for($j=1;$j<3;$j++) {
            
            $position = new Position();
            $position->setlibelleposition('B'.$j);            
            $manager->persist($position);
        }       

        $manager->flush();
    }
}
