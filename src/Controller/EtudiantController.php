<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }
#[Route('/etudiant/create', name: 'app_etudiant_create')]
public function createE(Request $request,\Doctrine\Persistence\ManagerRegistry $doctrine)
{
  $etudiant=new Etudiant();
  $form=$this->createForm(EtudiantType::class,$etudiant);
  $form->handleRequest($request);
   if ($form->isSubmitted() && $form->isValid())
   {
      $em=$doctrine->getManager();
      $em->persist($etudiant);
      $em->flush();
      return $this->redirectToRoute('app_etudiant');
   }
  return $this->renderForm('etudiant/create.html.twig',['form'=>$form]);
}


}
