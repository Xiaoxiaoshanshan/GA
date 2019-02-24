<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Oeuvre;

class OeuvreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
     
        /*$faker = Faker\Factory::create();

        for($i=0;$i<30;$i++) {
            
            $oeuvre = new Oeuvre();

            $oeuvre->settitre($faker->words($maxnb = 5,$minnb = 1));
            $oeuvre->setimg($faker->imageUrl($width = 400, $height = 300, 'nature')); 
            $oeuvre->setlongueur($faker->randomFloat($nbMaxDecimals = 1, $min = 20, $max = 500));
            $oeuvre->setlargeur($faker->randomFloat($nbMaxDecimals = 1, $min = 20, $max = 500));
            $oeuvre->sethauteur($faker->randomFloat($nbMaxDecimals = 1, $min = 20, $max = 500));
            $oeuvre->setdiametre($faker->randomFloat($nbMaxDecimals = 1, $min = 20, $max = 500));
            $oeuvre->setperiodcreation($faker->date($format = 'Y', $max = 'now'));
            $oeuvre->setdescription($faker->paragraph($nbSentences = 5, $variableNbSentences = true));
            $oeuvre->settype_id($faker->numberBetween($min = 1, $max = 3));
            $oeuvre->setetat_id($faker->numberBetween($min = 1, $max = 3));

          
            $manager->persist($oeuvre);
        }
        $manager->flush();*/
    }
}
