<?php


namespace App\Controller\Api;


use App\Entity\Attendance;
use App\Entity\Student;
use App\Entity\Teacher;
use App\Message\StudentMessage;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class ApiController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/api/v1/get-all-users")
     */
    public function getAllStudents()
    {
        $students = $this->entityManager->getRepository(Student::class)->findAll();
        $response = new Response();
        $response->setContent($this->serializer->serialize($students, 'json', ['groups' => 'student']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/api/v1/get-all-teachers")
     */
    public function getAllTeachers()
    {
        $teachers = $this->entityManager->getRepository(Teacher::class)->findAll();
        $response = new Response();
        $response->setContent($this->serializer->serialize($teachers, 'json', ['groups' => 'teacher']));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/api/v2/create-visit-student/{stId}")
     */
    public function createVisitUniversityStudent($stId)
    {
        if ($stId) {
            $student = $this->entityManager->getRepository(Student::class)->findOneBy(['studentId' => $stId]);

            if (isset($student)) {
                $visit = $this->entityManager->getRepository(Attendance::class)->createVisitUniversity($student->getStudentId());
                $data = [
                    'success' => true,
                    'studentId' => $visit->getIdent(),
                    'date' => $visit->getDateTime()->format('d-m-Y h:m:s')
                ];
                $response = new Response();
                $response->setContent($this->serializer->serialize($data, 'json'));
                $response->headers->set('Content-Type', 'application/json');
            } else {
                $data = [
                    'success' => false,
                    'status' => 400,
                ];
            }
        } else {
            $response = new Response();
            $response->setContent($this->serializer->serialize(['success' => false], 'json'));
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode(400);
        }

        return $response;
    }

    /**
     * @Route("/api/v2/date-to-visit-student-to-university/{stId}")
     */
    public function dateToVisitUniversityStudent($stId, MessageBusInterface $messageBus)
    {
        if ($stId) {
            $student = $this->entityManager->getRepository(Student::class)->findOneBy(['studentId' => $stId]);

            if (isset($student)) {

//                $message = new StudentMessage();
//                $messageBus->dispatch(new StudentMessage());
                $visit = $this->entityManager->getRepository(Attendance::class)->dateToVisitUniversity($student->getStudentId());
                $data = [
                    'success' => true,
                    'status' => 200,
                    'studentId' => $visit->getIdent(),
                    'data' => $visit->getDateTime()->format('d-m-Y h:m:s'),
                    'dataTo' => $visit->getDateTimeTo(),
                ];
            } else {
                $data = [
                    'success' => false,
                    'status' => 400,
                ];
            }

            $response = new Response();
            $response->setContent($this->serializer->serialize($data, 'json'));
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode($data['status']);

        } else {
            $response = new Response();
            $response->setContent($this->serializer->serialize(['success' => false], 'json'));
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode(400);
        }

        return $response;
    }

    /**
     * @Route("/api/v2/create-visit-teacher/{teacherId}")
     */
    public function createVisitUniversityTeacher($teacherId)
    {
        if ($teacherId) {
            $teacher = $this->entityManager->getRepository(Teacher::class)->findOneBy(['teacherId' => $teacherId]);

            if (isset($teacher)) {
                $visit = $this->entityManager->getRepository(Attendance::class)->createVisitUniversity($teacher->getTeacherId());
                $data = [
                    'success' => true,
                    'teachertId' => $visit->getIdent(),
                    'date' => $visit->getDateTime()->format('d-m-Y h:m:s')
                ];
            } else {
                $data = [
                    'success' => false,
                    'status' => 400,
                ];
            }
            $response = new Response();
            $response->setContent($this->serializer->serialize($data, 'json'));
            $response->headers->set('Content-Type', 'application/json');
        } else {
            $response = new Response();
            $response->setContent($this->serializer->serialize(['success' => false], 'json'));
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode(400);
        }

        return $response;
    }

    /**
     * @Route("/api/v2/date-to-visit-teacher-to-university/{teacherId}")
     */
    public function dateToVisitUniversityTeacher($teacherId)
    {
        if ($teacherId) {
            $teacher = $this->entityManager->getRepository(Teacher::class)->findOneBy(['teacherId' => $teacherId]);

            if (isset($teacher)) {
                $visit = $this->entityManager->getRepository(Attendance::class)->dateToVisitUniversity($teacher->getTeacherId());
                $data = [
                    'success' => true,
                    'status' => 200,
                    'studentId' => $visit->getIdent(),
                    'data' => $visit->getDateTime()->format('d-m-Y h:m:s'),
                    'dataTo' => $visit->getDateTimeTo(),
                ];
            } else {
                $data = [
                    'success' => false,
                    'status' => 400,
                ];
            }

            $response = new Response();
            $response->setContent($this->serializer->serialize($data, 'json'));
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode($data['status']);

        } else {
            $response = new Response();
            $response->setContent($this->serializer->serialize(['success' => false], 'json'));
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode(400);
        }

        return $response;
    }
}