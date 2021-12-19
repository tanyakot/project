<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\Student;
use App\Form\ArticleType;
use App\Form\StudentType;
use App\Repository\RoleRepository;
use App\Repository\StudentRepository;
use App\Service\Helper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * @Route("/student")
 */
class StudentController extends AbstractController
{
    /**
     * @Route("/", name="student_index", methods={"GET"})
     */
    public function index(StudentRepository $studentRepository, HttpKernelInterface $httpKernel): Response
    {
        return $this->render('student/index.html.twig', [
            'students' => $studentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="student_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $student = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $id = 'STUDENT-' . date('ymd') . mt_rand(1000, 9999) . date('Hi') . mt_rand(1000, 9999);
            $student->setStudentId($id);
            $entityManager->persist($student);
            $entityManager->flush();
            return $this->redirectToRoute('student_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('student/new.html.twig', [
            'student' => $student,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="student_show", methods={"GET"})
     */
    public function show(Request $request, Student $student): Response
    {
        return $this->render('student/show.html.twig', [
            'student' => $student,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="student_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $id = 0): Response
    {
        if ($id) {
            $student = $this->getDoctrine()->getManager()->getRepository(Student::class)->find($id);
        }
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photo = $form->get('photo_uploads')->getData();
            if ($photo) {
                $fileName = uniqid() .'.' . $photo->guessExtension();
                $path = $this->getParameter('kernel.project_dir');
                $path.= '/public/web/uploads/student';

                $photo->move($path, $fileName);
                $student->setPhoto($fileName);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($student);
            $entityManager->flush();
            return $this->redirectToRoute('student_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('student/edit.html.twig', [
            'student' => $student,
            'form' => $form,
        ]);
    }

    /**
     * @Route("delete/{id}", name="student_delete", methods={"POST"})
     */
    public function delete(Request $request, Student $student): Response
    {
        if ($this->isCsrfTokenValid('delete'.$student->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($student);
            $entityManager->flush();
        }

        return $this->redirectToRoute('student_index', [], Response::HTTP_SEE_OTHER);
    }
}
