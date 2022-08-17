<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/classroom')]
class ClassroomController extends AbstractController
{
    #[Route('/index', name: 'classroom_index')]
    public function classroomIndex()
    {
        $classrooms = $this->getDoctrine()->getRepository(Classroom::class)->findAll();
        return $this->render('classroom/index.html.twig', 
        [
            'classrooms' => $classrooms
        ]);
    }

    #[Route('/detail/{id}', name:'classroom_detail')]
    public function classroomDetail ($id, ClassroomRepository $classroomRepository) 
    {
        $classroom = $classroomRepository->find($id);
        if ($classroom == null)
        {
            $this ->addFlash('Warning', 'Invalid class $id !');
            return $this->redirectToRoute('classroom_index');
        }
        return $this->render('classroom/detail.html.twig', 
        [
            'classroom'=>$classroom
        ]);
    }

    #[Route('/delete/{id}', name: 'classroom_delete')]
    public function classroomDelete ($id, ManagerRegistry $managerRegistry)
    {
        $classroom = $managerRegistry->getRepository(Classroom::class)->find($id);
        if($classroom == null){
            $this ->addFlash('Warning', 'Class is not existed');
            return $this->redirectToRoute('classroom_index');
        } else {
            $manager = $managerRegistry->getManager();
            $manager -> remove($classroom);
            $manager ->flush();
            $this->addFlash('Info', 'Delete book successfully');
        }
        return $this->redirectToRoute('teacher_index');
    }

    #[Route('/add', name:'classroom_add')]
    public function classroomAdd (Request $request)
    {
        $classroom = new Classroom();
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($classroom);
            $manager->flush();
            $this->addFlash('Info', 'New classroom is added successfully');
            return $this->redirectToRoute('classroom_index');
        }

        return $this->renderForm('classroom/add.html.twig', 
        [
            'classroomForm' => $form
        ]);
    }

    #[Route('/edit/{id}', name: 'classroom_edit')]
    public function classroomEdit ($id, Request $request)
    {
        $classroom = $this->getDoctrine()->getRepository(Classroom::class)->find($id);
        if($classroom == null)
        {
            $this->addFlash('Warning', 'Wrong ID');
            return $this->redirectToRoute('classroom_index');
        } else {
            $form = $this->createForm(ClassroomType::class, $classroom);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($classroom);
                $manager->flush();
                $this->addFlash('Info', 'Add book successfully');
                return $this->redirectToRoute('classroom_index');
            }
            return $this->renderForm('classroom/edit.html.twig', 
            [
                'classroomForm' => $form
            ]);
        }
    }
}
