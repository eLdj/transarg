<?php

namespace App\Controller;


use App\Entity\Compte;
use App\Form\CompteType;
use App\Entity\Partenaire;
use App\Repository\CompteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("api/compte")
 */
class CompteController extends AbstractController
{
    /**
     * @Route("/", name="compte_index", methods={"GET"})
     */
    public function index(CompteRepository $compteRepository): Response
    {
        return $this->render('compte/index.html.twig', [
            'comptes' => $compteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="compte_new", methods={"GET","POST"})
     * 
     */
    public function new(Request $request, EntityManagerInterface $entityManager,SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $valeurs = json_decode($request->getContent());
       
        if(isset($valeurs->montant)){
           $compte = new Compte();
           $compte->setMontant($valeurs->montant);
           $compte->setDateDepot(new \DateTime());             
           $partenaire = $this->getDoctrine()->getRepository(Partenaire::class)->find($valeurs->partenaire);
           $compte->setPartenaire($partenaire);

           $errors = $validator->validate($compte);

           if(count($errors))
           {
               $errors = $serializer->serialize($errors,'json');

               return new Response($errors, 500, [
                   'Content-Type' => 'application/json'
               ]);
           }
                    
           $entityManager->persist($compte);
           $entityManager->flush();

           $data = [
            'status' => 201,
            'message' => 'L\'utilisateur a été créé'
        ];
        return new JsonResponse($data, 201);
        }  
        $datas= [
                
            'status' => 500,
            'message' => 'erreur '
        ];
        return new JsonResponse($datas, 500);
    }


    /**
     * @Route("/{id}", name="compte_show", methods={"GET"})
     */
    public function show(Compte $compte): Response
    {
        return $this->render('compte/show.html.twig', [
            'compte' => $compte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="compte_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Compte $compte): Response
    {
        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('compte_index');
        }

        return $this->render('compte/edit.html.twig', [
            'compte' => $compte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="compte_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Compte $compte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$compte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($compte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('compte_index');
    }
}
