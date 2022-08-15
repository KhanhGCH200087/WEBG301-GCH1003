<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Stu_name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Stu_age;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Stu_gender;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Stu_image;

    #[ORM\Column(type: 'string', length: 255)]
    private $Stu_email;

    #[ORM\Column(type: 'string', length: 255)]
    private $Stu_pass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStuName(): ?string
    {
        return $this->Stu_name;
    }

    public function setStuName(string $Stu_name): self
    {
        $this->Stu_name = $Stu_name;

        return $this;
    }

    public function getStuAge(): ?int
    {
        return $this->Stu_age;
    }

    public function setStuAge(?int $Stu_age): self
    {
        $this->Stu_age = $Stu_age;

        return $this;
    }

    public function getStuGender(): ?string
    {
        return $this->Stu_gender;
    }

    public function setStuGender(?string $Stu_gender): self
    {
        $this->Stu_gender = $Stu_gender;

        return $this;
    }

    public function getStuImage(): ?string
    {
        return $this->Stu_image;
    }

    public function setStuImage(?string $Stu_image): self
    {
        $this->Stu_image = $Stu_image;

        return $this;
    }

    public function getStuEmail(): ?string
    {
        return $this->Stu_email;
    }

    public function setStuEmail(string $Stu_email): self
    {
        $this->Stu_email = $Stu_email;

        return $this;
    }

    public function getStuPass(): ?string
    {
        return $this->Stu_pass;
    }

    public function setStuPass(string $Stu_pass): self
    {
        $this->Stu_pass = $Stu_pass;

        return $this;
    }
}
