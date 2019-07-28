<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Entity\Statut;
use App\Entity\Partenaire;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/api")
 */
class AuthentificationController extends AbstractController
{
    /**
     * @Route("/authentification", name="authentification", methods={"POST"})
     *  @Security("has_role('ROLE_SUPERADMIN')")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager,SerializerInterface $serializer, ValidatorInterface $validator )
    {
       $values = json_decode($request->getContent());

       if(isset($values->username, $values->password))
       {
           $user = new Utilisateur();
           $user->setNom($values->nom);
           $user->setPrenom($values->prenom);
           $user->setEmail($values->email);
           $profil=$this->getDoctrine()->getRepository(Profil::class)->find($values->profil);              
           $user->setProfil($profil); 
           $statut = $this->getDoctrine()->getRepository(Statut::class)->find($values->statut);
           $user->setStatut($statut);
           $user->setRoles(['ROLE_SUPERUSER']);
           $user->setUsername($values->username);
           $user->setPassword($passwordEncoder->encodePassword($user, $values->password));
           $partenaire = $this->getDoctrine()->getRepository(Partenaire::class)->find($values->partenaire);
           $user->setPartenaire($partenaire);           
           $user->setCin($values->cin);        
           $errors = $validator->validate($user);

           if(count($errors))
           {
               $errors = $serializer->serialize($errors,'json');

               return new Response($errors, 500, [
                   'Content-Type' => 'application/json'
               ]);
           }
           
           
           $entityManager->persist($user);
           $entityManager->flush();

           $data = [
            'status' => 201,
            'message' => 'L\'utilisateur a été créé'
        ];
        return new JsonResponse($data, 201);
        }
        
        $data = [
            'status' => 500,
            'message' => 'Vous devez renseigner les clés username et password'
        ];
        return new JsonResponse($data, 500);

      
    }
    /**
     * @Route("/connect_check",name="connect",methods={"POST","GET"})
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $user = $this->getUser();

        return $this->json([
            'username' => $user->getUsername(),
            'roles'=> $user->getRoles()
        ]);
    }
}
