<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new Utilisateur();
           $user->setNom('test51');
           $user->setPrenom('test51');
           $user->setEmail('test@hotmail.fr');
           #$profil=$this->getDoctrine()->getRepository(Profil::class)->find($values->profil);              
           $user->setProfil(1); 
           $user->setRoles(['ROLE_SUPERUSER']);
           $user->setStatut('débloqué');     
           $user->setUsername('sudo');
           $user->setPassword($passwordEncoder->encodePassword($user, 'pass'));
           #$partenaire = $this->getDoctrine()->getRepository(Partenaire::class)->find($values->partenaire);
           $user->setPartenaire(1);           
           $user->setCin('123548'); 
        $manager->flush();
    }
}
