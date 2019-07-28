<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/api")
*/
class PartenaireController extends AbstractController
{
  
/**
* @Route ("/ajoutpar",name="ajoutpar" ,methods={"POST"})
*/
public function Add(Request $request, EntityManagerInterface $entityManager){
    $valeurs = json_decode($request->getContent());
    if(isset($valeurs->nomEntreprise,$valeurs->ninea,$valeurs->adresse,$valeurs->raisonSocilale,$valeurs->email,$valeurs->numeroCompte)){
        $partenaire= new Partenaire();
        $partenaire->setNomEntreprise($valeurs->nomEntreprise);
        $partenaire->setNinea($valeurs->ninea);
        $partenaire->setAdresse($valeurs->adresse);
        $partenaire->setRaisonSocilale($valeurs->raisonSocilale);
        $partenaire->setEmail($valeurs->email);
        $partenaire->setNumeroCompte($valeurs->numeroCompte);
        $user = $this->getDoctrine()->getRepository(Utilisateur::class)->find($valeurs->utilisateur);
        $partenaire->setUtilisateur($user);
        $partenaire->setMontantCompte($valeurs->montantCompte);

        $entityManager->persist($partenaire);
        $entityManager->flush();
         
        $datas= [
           
            'status' => 201,
            'message' => 'Partenaire enregistré'
            ];
            return new JsonResponse($datas, 201);

        }
        $datas= [
                
            'status' => 500,
            'message' => 'erreur '
        ];
        return new JsonResponse($datas, 500);
    }

    /**
     * @Route("/modifpart/{id}", name="modif_partenaire",methods={"PUT"})
     */
    public function modif(Request $request, SerializerInterface $serializer, Partenaire $partenaire, ValidatorInterface $validateur, EntityManagerInterface $entityManager)
    {
        $partenaireModif=$entityManager->getRepository(Partenaire::class)->find($partenaire->getId());

        $donnee=json_decode($request->getContent());

        foreach($donnee as $cle=>$valeur)
        {
            if($cle && !empty($valeur))
            {
                $nom = ucfirst($cle);
                $setter = 'set'.$nom;
                $partenaireModif->$setter($valeur);
            }
        }

        $errors = $validateur->validate($partenaireModif);
        
        if(count($errors))
        {
            $errors = $serializer->serialize($errors, 'json');
            return new Response($errors, 500, [
                'Content-Type' => 'application/json'
            ]);
        }

        $entityManager->flush();
        $data = [
            'statuse' => 200,
            'messages' => 'Le téléphone a bien été mis à jour'
        ];
        return new JsonResponse($data);
    }
}