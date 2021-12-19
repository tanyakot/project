<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\Teacher;
use App\Form\TeacherType;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/teacher")
 */
class TeacherController extends AbstractController
{
    /**
     * @Route("/", name="teacher_index", methods={"GET"})
     */
    public function index(TeacherRepository $teacherRepository): Response
    {
        return $this->render('teacher/index.html.twig', [
            'teachers' => $teacherRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="teacher_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $teacher = new Teacher();
        $form = $this->createForm(TeacherType::class, $teacher);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photo = $form->get('photo_uploads')->getData();
            if ($photo) {
                $fileName = uniqid() .'.' . $photo->guessExtension();
                $path = $this->getParameter('kernel.project_dir');
                $path.= '/public/web/uploads/teacher';

                $photo->move($path, $fileName);
                $teacher->setPhoto($fileName);
            }

            $teacherId = 'TEACHER-' . date('ymd') . mt_rand(1000, 9999) . date('Hi') . mt_rand(1000, 9999);
            $teacher->setTeacherId($teacherId);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($teacher);
            $entityManager->flush();

            return $this->redirectToRoute('teacher_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('teacher/new.html.twig', [
            'teacher' => $teacher,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="teacher_show", methods={"GET"})
     */
    public function show(Teacher $teacher): Response
    {
        return $this->render('teacher/show.html.twig', [
            'teacher' => $teacher,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="teacher_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $id = 0): Response
    {
        if ($id) {
            $teacher = $this->getDoctrine()->getManager()->getRepository(Teacher::class)->find($id);
        }
        $form = $this->createForm(TeacherType::class, $teacher);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photo = $form->get('photo_uploads')->getData();
            if ($photo) {
                $fileName = uniqid() .'.' . $photo->guessExtension();
                $path = $this->getParameter('kernel.project_dir');
                $path.= '/public/web/uploads/teacher';

                $photo->move($path, $fileName);
                $teacher->setPhoto($fileName);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($teacher);
            $entityManager->flush();

            return $this->redirectToRoute('teacher_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('teacher/edit.html.twig', [
            'teacher' => $teacher,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="teacher_delete", methods={"POST"})
     */
    public function delete(Request $request, Teacher $teacher): Response
    {
        if ($this->isCsrfTokenValid('delete'.$teacher->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($teacher);
            $entityManager->flush();
        }

        return $this->redirectToRoute('teacher_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/download/report", name="download_report", methods={"GET"})
     */
    public function downloadReport()
    {
//        try {
//            $file = file_get_contents( $path . '/'. $fileName);
//        } catch (\Throwable $exception) {
//            return new JsonResponse(['message' => 'file not found'],400);
//        }
//
//        $response = new Response();
//        $response->headers->set('Content-type', 'application/octet-stream');
//        $response->headers->set('Content-Disposition', sprintf('attachment; filename="%s"','$fileName'));
//        $response->setContent('klklklklklklk');
//        $response->setStatusCode(200);
//        $response->headers->set('Content-Transfer-Encoding', 'binary');
//        $response->headers->set('Pragma', 'no-cache');
//        $response->headers->set('Expires', '0');
//
//        return $response;

//        if($download !== false) {
//            $fileName = is_null($fileName) ? sprintf('main_report_%d', $download['task_id']) : $fileName;
//            $handle = fopen(WEB_DIR . '/uploads/report/' . $fileName . '.csv', 'w');
//            fputs($handle, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM
//            fputcsv($handle, array_values($download['fields']), ';');
//        }
//        string(31) "/home/developer/my_project_test"
        $fileName = 'report';
        $path = $this->getParameter('kernel.project_dir');
        $path.= '/public/web/uploads/';
        $handle = fopen($path . $fileName.'.pdf', 'w');
        fputs($handle, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM

        fputcsv($handle, [
            'id',
            'item_name',
            'final_url',
            'image_url',
            'item_subtitle',
        ], ';');



        try {
            $file = file_get_contents( $path . '/'. $fileName);
        } catch (\Throwable $exception) {
            return new JsonResponse(['message' => 'file not found'],400);
        }

        $response = new Response();
        $response->headers->set('Content-type', 'application/octet-stream');
        $response->headers->set('Content-Disposition', sprintf('attachment; filename="%s"',$fileName));
        $response->setContent($file);
        $response->setStatusCode(200);
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
//        return $this->redirectToRoute('teacher_index', [], Response::HTTP_SEE_OTHER);

    }
}
