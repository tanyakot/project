<?php

namespace App\Entity;

use App\Repository\AttendanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttendanceRepository::class)
 */
class Attendance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable="true")
     */
    private $student;

    /**
     * @ORM\Column(type="string", name="ident")
     */
    private $ident;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateTime;

    /**
     * @ORM\Column(type="datetime", nullable="true")
     */
    private $dateTimeTo;

    /**
     * @return mixed
     */
    public function getDateTimeTo()
    {
        return $this->dateTimeTo;
    }

    /**
     * @param mixed $dateTimeTo
     */
    public function setDateTimeTo($dateTimeTo): void
    {
        $this->dateTimeTo = $dateTimeTo;
    }

    /**
     * @ORM\Column(type="boolean", nullable="true")
     */
    private $state;

    public function __construct()
    {
        $this->dateTime = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdent()
    {
        return $this->ident;
    }

    public function setIdent($ident): self
    {
        $this->ident = $ident;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->dateTime;
    }

    public function setDateTime(\DateTimeInterface $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getState(): ?bool
    {
        return $this->state;
    }

    public function setState(bool $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function setStudent($ident): self
    {
        $this->ident = $ident;

        return $this;
    }
}
