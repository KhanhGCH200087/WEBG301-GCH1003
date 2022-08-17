<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Repository\SubjectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/subject')]
class SubjectController extends AbstractController
{
    #[Route('/subject', name: 'app_subject')]
    public function index(): Response
    {
        return $this->render('subject/index.html.twig', [
            'controller_name' => 'SubjectController',
        ]);
    }
    #[Route('/index', name: 'subject_index')]
    public function subjectIndex () {
      $subjects = $this->getDoctrine()->getRepository(subject::class)->findAll();
      return $this->render('subject/index.html.twig',
          [
              'subjects' => $subjects
          ]);
    }

    #[Route('/list', name: 'subject_list')]
    public function subjectList () {
      $subjects = $this->getDoctrine()->getRepository(subject::class)->findAll();
      return $this->render('subject/list.html.twig',
          [
              'subjects' => $subjects
          ]);
    }
  
    #[Route('/detail/{id}', name: 'subject_detail')]
    public function subjectDetail ($id, SubjectRepository $subjectRepository) {
      $subject = $subjectRepository->find($id);
      if ($subject == null) {
          $this->addFlash('Warning', 'Invalid subject id !');
          return $this->redirectToRoute('subject_index');
      }
      return $this->render('subject/detail.html.twig',
          [
              'subject' => $subject
          ]);
    }
  
    #[IsGranted("ROLE_ADMIN")]
    #[Route('/delete/{id}', name: 'subject_delete')]
    public function subjectDelete ($id, ManagerRegistry $managerRegistry) {
      $subject = $managerRegistry->getRepository(subject::class)->find($id);
      if ($subject == null) {
          $this->addFlash('Warning', 'subject not existed !');
      } 
      else if (count($subject->getBooks()) > 0) {
        $this->addFlash('Warning', 'Can not delete this subject !');
      } 
      else {
          $manager = $managerRegistry->getManager();
          $manager->remove($subject);
          $manager->flush();
          $this->addFlash('Info', 'Delete subject successfully !');
      }
      return $this->redirectToRoute('subject_index');
    }
  
    #[Route('/add', name: 'subject_add')]
    public function subjectAdd (Request $request) {
      $subject = new Subject;
      $form = $this->createForm(subjectType::class,$subject);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $manager = $this->getDoctrine()->getManager();
          $manager->persist($subject);
          $manager->flush();
          $this->addFlash('Info','Add subject successfully !');
          return $this->redirectToRoute('subject_index');
      }
      return $this->renderForm('subject/add.html.twig',
      [
          'subjectForm' => $form
      ]);
    }
  
    #[Route('/edit/{id}', name: 'subject_edit')]
    public function subjectEdit ($id, Request $request) {
      $subject = $this->getDoctrine()->getRepository(subject::class)->find($id);
      if ($subject == null) {
          $this->addFlash('Warning', 'subject not existed !');
          return $this->redirectToRoute('subject_index');
      } else {
          $form = $this->createForm(subjectType::class,$subject);
          $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) {
              $manager = $this->getDoctrine()->getManager();
              $manager->persist($subject);
              $manager->flush();
              $this->addFlash('Info','Edit subject successfully !');
              return $this->redirectToRoute('subject_index');
          }
          return $this->renderForm('subject/edit.html.twig',
          [
              'subjectForm' => $form
          ]);
      }
    }

}

