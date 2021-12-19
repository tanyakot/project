<?php


namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TeacherRepository::class)
 */
class Teacher
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(name="teacher_id", type="string", unique=true)
     */
    public $teacherId;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(type="date")
     */
    private $bithday;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Groups({"teacher"})
     * @ORM\Column(type="string")
     */
    private $department;

    /**
     * @Groups({"teacher"})
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

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment($department): self
    {
        $this->department = $department;

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

    public function getTeacherId()
    {
        return $this->teacherId;
    }

    public function setTeacherId($teacherId)
    {
        $this->teacherId = $teacherId;

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

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

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