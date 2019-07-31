<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TestFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new Utilisateur();
        $user->setNom('_');
        $user->setPrenom('_');
        $user->setEmail('_');
        $user->setRoles(['ROLE_SUPERUSER']);
        $user->setStatut('_');     
        $user->setUsername('pass');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$hWHjOMfuHSZCx3RDmp+azg$UMmA9aDjt+m5kY3P+dCwJmpv4R0amFU5G/+bPNuGEn4');           
        $user->setCin(0);        
        $manager->persist($user);

        $manager->flush();
    }
}
