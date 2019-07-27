<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;

/**
* @Route("/api")
*/
class PartenaireController extends AbstractController
{
    /**
    * @Route("/partenaire", name="partenaire" ,methods={"GET"})
    */
    public function index()
    {
        return $this->render('partenaire/index.html.twig', [
            'controller_name' => 'PartenaireController',
        ]);
    }
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
}