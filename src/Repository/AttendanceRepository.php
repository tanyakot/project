<?php

namespace App\Repository;

use App\Entity\Attendance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Attendance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attendance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attendance[]    findAll()
 * @method Attendance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttendanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Attendance::class);
    }

    public function createVisitUniversity(string $ident)
    {
        $visit = new Attendance();
        $visit->setDateTime(new \DateTime());
        $visit->setIdent($ident);

        $this->getEntityManager()->persist($visit);
        $this->getEntityManager()->flush();

        return $visit;
    }

    public function dateToVisitUniversity(string $ident)
    {
        $visit = $this->findOneBy(['ident' => $ident], ['id' => 'DESC']);
        $visit->setDateTimeTo(new \DateTime());

        $this->getEntityManager()->flush();

        return $visit;
    }
}
