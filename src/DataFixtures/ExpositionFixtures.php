<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Exposition;

class ExpositionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {        
        /*$faker = Faker\Factory::create();

        for($i=0;$i<10;$i++) {
            
            $exposition = new Exposition();    

            $exposition->settitre($faker->words($maxnb = 5,$minnb = 1));
            $exposition->setposter($faker->imageUrl($width = 350, $height = 250, 'nature')); 
            $exposition->setdatedebut($faker->dateTimeThisYear($max = 'now', $timezone = null) );
            $exposition->setdatefin($faker->dateTimeThisYear($max = 'now', $timezone = null) );

            $exposition->setdescription($faker->paragraph($nbSentences = 5, $variableNbSentences = true));
          
            $manager->persist($exposition);
        }
        $manager->flush();*/
    }
}
