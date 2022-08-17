<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Form\TeacherType;
use App\Repository\TeacherRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/teacher')]
class TeacherController extends AbstractController
{
    #[Route('/index', name: 'teacher_index')]
    public function teacherIndex()
    {
        $teachers = $this->getDoctrine()->getRepository(Teacher::class)->findAll();
        return $this->render('teacher/index.html.twig', 
        [
            'teachers' => $teachers
        ]);
    }

    #[Route('/detail/{id}', name:'teacher_detail')]
    public function teacherDetail ($id, TeacherRepository $teacherRepository) 
    {
        $teacher = $teacherRepository->find($id);
        if ($teacher == null)
        {
            $this ->addFlash('Warning', 'Invalid teacher $id !');
            return $this->redirectToRoute('teacher_index');
        }
        return $this->render('teacher/detail.html.twig', 
        [
            'teacher'=>$teacher
        ]);
    }

    #[Route('/delete/{id}', name: 'teacher_delete')]
    public function teacherDelete ($id, ManagerRegistry $managerRegistry)
    {
        $teacher = $managerRegistry->getRepository(Teacher::class)->find($id);
        if($teacher == null){
            $this ->addFlash('Warning', 'Teacher is not existed');
            return $this->redirectToRoute('teacher_index');
        } else {
            $manager = $managerRegistry->getManager();
            $manager -> remove($teacher);
            $manager ->flush();
            $this->addFlash('Info', 'Delete teacher successfully');
        }
        return $this->redirectToRoute('teacher_index');
    }

    #[Route('/add', name:'teacher_add')]
    public function teacherAdd (Request $request)
    {
        $teacher = new Teacher();
        $form = $this->createForm(TeacherType::class, $teacher);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($teacher);
            $manager->flush();
            $this->addFlash('Info', 'New teacher is added successfully');
            return $this->redirectToRoute('teacher_index');
        }
        return $this->renderForm('teacher/add.html.twig', 
        [
            'teacherForm' => $form
        ]);
    }

    #[Route('/edit/{id}', name: 'teacher_edit')]
    public function teacherEdit ($id, Request $request)
    {
        $teacher = $this->getDoctrine()->getRepository(Teacher::class)->find($id);
        if($teacher == null)
        {
            $this->addFlash('Warning', 'Wrong ID');
            return $this->redirectToRoute('teacher_index');
        } else {
            $form = $this->createForm(TeacherType::class, $teacher);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($teacher);
                $manager->flush();
                $this->addFlash('Info', 'Add book successfully');
                return $this->redirectToRoute('teacher_index');
            }
            return $this->renderForm('teacher/edit.html.twig', 
            [
                'teacherForm' => $form
            ]);
        }
    }
}
