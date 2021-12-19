<?php

namespace App\Entity;

use App\Repository\TimetableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TimetableRepository::class)
 */
class Timetable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $department;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $course;

    /**
     * @ORM\Column(name="day_of_week", type="text", nullable=true)
     */
    private $dayOfWeek;

    /**
     * @ORM\Column(name="lesson_one", type="string", nullable=true)
     */
    private $lessonOne;

    /**
     * @ORM\Column(name="lesson_two", type="string", nullable=true)
     */
    private $lessonTwo;

    /**
     * @ORM\Column(name="lesson_three", type="string", nullable=true)
     */
    private $lessonThree;

    /**
     * @ORM\Column(name="lesson_four", type="string", nullable=true)
     */
    private $lessonFour;

    public function __construct()
    {
        $this->title = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    /**
     * @param mixed $dayOfWeek
     */
    public function setDayOfWeek($dayOfWeek): void
    {
        $this->dayOfWeek = $dayOfWeek;
    }

    /**
     * @return mixed
     */
    public function getLessonOne()
    {
        return $this->lessonOne;
    }

    /**
     * @param mixed $lessonOne
     */
    public function setLessonOne($lessonOne): void
    {
        $this->lessonOne = $lessonOne;
    }

    /**
     * @return mixed
     */
    public function getLessonTwo()
    {
        return $this->lessonTwo;
    }

    /**
     * @param mixed $lessonTwo
     */
    public function setLessonTwo($lessonTwo): void
    {
        $this->lessonTwo = $lessonTwo;
    }

    /**
     * @return mixed
     */
    public function getLessonThree()
    {
        return $this->lessonThree;
    }

    /**
     * @param mixed $lessonThree
     */
    public function setLessonThree($lessonThree): void
    {
        $this->lessonThree = $lessonThree;
    }

    /**
     * @return mixed
     */
    public function getLessonFour()
    {
        return $this->lessonFour;
    }

    /**
     * @param mixed $lessonFour
     */
    public function setLessonFour($lessonFour): void
    {
        $this->lessonFour = $lessonFour;
    }

    /**
     * @return mixed
     */
    public function getLessonFive()
    {
        return $this->lessonFive;
    }

    /**
     * @param mixed $lessonFive
     */
    public function setLessonFive($lessonFive): void
    {
        $this->lessonFive = $lessonFive;
    }

    /**
     * @ORM\Column(name="lesson_five", type="string", nullable=true)
     */
    private $lessonFive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function gettitle(): ?string
    {
        return $this->title;
    }

    public function settitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getCourse(): ?string
    {
        return $this->course;
    }

    public function setCourse(?string $course): self
    {
        $this->course = $course;

        return $this;
    }
}
