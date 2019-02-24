<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Artiste;


class ArtisteFixtures extends Fixture
{
  
    public function load(ObjectManager $manager)
    {   

        $faker = Faker\Factory::create();

        for($i=0;$i<17;$i++) {
            
            $artiste = new Artiste();
            $artiste->setpays($faker->country);
            $artiste->setnom($faker->lastName);
            $artiste->setprenom($faker->firstName);
            $artiste->setdescription($faker->paragraph($nbSentences = 10, $variableNbSentences = true));
          
            $manager->persist($artiste);
        }
      
        $manager->flush();
    }
}
