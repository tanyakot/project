<?php


namespace App\Generator;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Exception;

class StudentIdGenerator extends AbstractIdGenerator
{
    public function generate(EntityManager $em, $entity)
    {
        $entity_name = $em->getClassMetadata(get_class($entity))->getName();

//        $date = date('ymd');
//        $time = date('Hi');

//            $id = 'STUDENT-' . $date . mt_rand(1000, 9999) . $time . mt_rand(1000, 9999);
        $studentId = 'STUDENT-211120116720363302';
        $entity->setStudentId($studentId);
        $em->persist($entity);
        $em->flush();
//            dd($id);

//            if (!$em->find($entity_name, $studentId)) {
//                dd($studentId);

        return $studentId;
//            }

//        throw new Exception('OrderIdGenerator can\'t generate unique value');
    }

}