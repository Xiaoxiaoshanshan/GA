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

        for($i=0;$i<6;$i++) {
            
            $position = new Position();
            $position->setlibelleposition($faker->randomLetter);            
            $manager->persist($position);
        }
        $manager->flush();
    }
}
