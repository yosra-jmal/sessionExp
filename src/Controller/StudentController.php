<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
#[Route('/student/create', name: 'app_studentcreate')]
public function create(ManagerRegistry $doctrine,Request $request): Response
{ $em=$doctrine->getManager();
$student=new Student();
$form=$this->createForm(StudentType::class,$student);
$form->add('save',SubmitType::class);
$form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
{$data=$form->getData();
    $em->persist($student);
    $em->flush();
    return $this->redirectToRoute('app_student');
}
    return $this->renderForm('student/create.html.twig',['form'=>$form]);

}
}
