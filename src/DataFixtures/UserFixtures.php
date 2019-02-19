<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setemail('shanman@gmail.com');
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN','ROLE_SUPER_ADMIN']);
        $user->setpassword('$argon2i$v=19$m=1024,t=2,p=2$c3F5SGE5SzN3cTlEZ3RMUQ$HuHsWUxWvRX3ce7wPSn3baYw9bqMOaY9qnvD/CwQPW0');
        $user->setpseudo('xiaoshanman');
        $user->setnom('shanman');
        $user->setprenom('WANG');
        $user->settel('0000000000');
        $user->setadresse(' 3 rue enfer');
        $user->setcp('41000');
        $user->setville('blois');

        $faker = Faker\Factory::create('fr_FR');

        for($i=0;$i<24;$i++) {
            
            $user1 = new User();
            $user1->setemail($faker->email);
            $user1->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
            $user1->setpassword('$argon2i$v=19$m=1024,t=2,p=2$c3F5SGE5SzN3cTlEZ3RMUQ$HuHsWUxWvRX3ce7wPSn3baYw9bqMOaY9qnvD/CwQPW0');
            $user1->setpseudo($faker->userName);
            $user1->setnom($faker->name);
            $user1->setprenom($faker->lastName);
            $user1->settel($faker->phoneNumber);
            $user1->setadresse($faker->address);
            $user1->setcp($faker->postCode);
            $user1->setville($faker->city);
            $manager->persist($user1);
        }
      
        $manager->persist($user);
        $manager->flush();
    }
}
