<?php

namespace App\Controller;


use App\Entity\Student;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/student')]
class StudentController extends AbstractController
{
    #[Route('/index', name: 'student_index')]
    public function studentIndex(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/detail/{id}', name: 'student_detail')]
    public function studentList () {
      $students = $this->getDoctrine()->getRepository(Student::class)->findAll();
      return $this->render('student/list.html.twig',
          [
              'students' => $students
          ]);
    }
    #[Route('/add', name: 'student_add')]
    public function studentAdd (Request $request) {
      $student = new Student;
      $form = $this->createForm(StudentType::class,$student);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
          $manager = $this->getDoctrine()->getManager();
          $manager->persist($student);
          $manager->flush();
          $this->addFlash('Info','Add student successfully !');
          return $this->redirectToRoute('student_index');
      }
      return $this->renderForm('student/add.html.twig',
      [
          'studentForm' => $form
      ]);
    }
    #[Route('/edit/{id}', name: 'student_edit')]
    public function studentEdit ($id, Request $request) {
        $student = $this->getDoctrine()->getRepository(Student::class)->find($id);
        if ($student == null) {
            $this->addFlash('Warning', 'Student not existed !');
            return $this->redirectToRoute('student _index');
        } else {
            $form = $this->createForm(StudentType::class,$student);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($student);
                $manager->flush();
                $this->addFlash('Info','Edit student successfully !');
                return $this->redirectToRoute('student_index');
            }
            return $this->renderForm('student/edit.html.twig',
            [
                'studentForm' => $form
            ]);
        }
      }
      #[Route('/detail/{id}', name: 'student_detail')]
      public function studentDetail ($id, StudentRepository $studentRepository) {
        $student = $studentRepository->find($id);
        if ($student == null) {
            $this->addFlash('Warning', 'Invalid student id !');
            return $this->redirectToRoute('student_index');
        }
        return $this->render('student/detail.html.twig',
            [
                'student' => $student
            ]);
      }
      #[Route('/delete/{id}', name: 'student_delete')]
      public function studentDelete ($id, ManagerRegistry $managerRegistry) {
        $student = $managerRegistry->getRepository(Student::class)->find($id);
        if ($student == null) {
            $this->addFlash('Warning', 'Student not existed !');
        
        } else {
            $manager = $managerRegistry->getManager();
            $manager->remove($student);
            $manager->flush();
            $this->addFlash('Info', 'Delete student successfully !');
        }
        return $this->redirectToRoute('student_index');
      }
    
}

