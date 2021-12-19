<?php

namespace App\Entity;

use App\Entity\User;
use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @Groups({"student"})
     * @ORM\Column(name="student_id", type="string", unique=true)
     */
    public $studentId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="date")
     */
    private $bithday;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="integer")
     */
    private $course;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="integer")
     */
    private $numberGroup;

    /**
     * @Groups({"student"})
     * @ORM\Column(type="string", length=180, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    public $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

//
//    /**
//     * @var string The hashed password
//     * @ORM\Column(type="string")
//     */
//    private $password;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getBithday()
    {
        return $this->bithday;
    }

    public function setBithday($bithday): self
    {
        $this->bithday = $bithday;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCourse(): ?string
    {
        return $this->course;
    }

    public function setCourse(string $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getNumberGroup(): ?int
    {
        return $this->numberGroup;
    }

    public function setNumberGroup(int $numberGroup): self
    {
        $this->numberGroup = $numberGroup;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getStudentId()
    {
        return $this->studentId;
    }

    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

//    /**
//     * @see UserInterface
//     */
//    public function getRoles(): array
//    {
//        $roles = $this->roles;
//        // guarantee every user at least has ROLE_USER
//        $roles[] = 'ROLE_USER';
//
//        return array_unique($roles);
//    }

    public function setRoles($roles): self
    {
        $this->roles = $roles;

        return $this;
    }
//
//    public function getPassword(): string
//    {
//        return $this->password;
//    }
//
//    public function setPassword(string $password): self
//    {
//        $this->password = $password;
//
//        return $this;
//    }
}
