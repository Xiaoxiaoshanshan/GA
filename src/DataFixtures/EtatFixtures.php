<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Etat;

class EtatFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $etat = new Etat();
        $etat->setlibelleetat('stock');

        $etat1 = new Etat();
        $etat1->setlibelleetat('livraison');

        $etat2 = new Etat();
        $etat2->setlibelleetat('exposée');


        $manager->persist($etat);
        $manager->persist($etat1);
        $manager->persist($etat2);
        $manager->flush();
    }
}
