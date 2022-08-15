<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Teacher_name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Teacher_age;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Teacher_gender;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Teacher_image;

    #[ORM\Column(type: 'string', length: 255)]
    private $Teacher_email;

    #[ORM\Column(type: 'string', length: 255)]
    private $Teacher_pass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeacherName(): ?string
    {
        return $this->Teacher_name;
    }

    public function setTeacherName(string $Teacher_name): self
    {
        $this->Teacher_name = $Teacher_name;

        return $this;
    }

    public function getTeacherAge(): ?int
    {
        return $this->Teacher_age;
    }

    public function setTeacherAge(?int $Teacher_age): self
    {
        $this->Teacher_age = $Teacher_age;

        return $this;
    }

    public function getTeacherGender(): ?string
    {
        return $this->Teacher_gender;
    }

    public function setTeacherGender(?string $Teacher_gender): self
    {
        $this->Teacher_gender = $Teacher_gender;

        return $this;
    }

    public function getTeacherImage(): ?string
    {
        return $this->Teacher_image;
    }

    public function setTeacherImage(?string $Teacher_image): self
    {
        $this->Teacher_image = $Teacher_image;

        return $this;
    }

    public function getTeacherEmail(): ?string
    {
        return $this->Teacher_email;
    }

    public function setTeacherEmail(string $Teacher_email): self
    {
        $this->Teacher_email = $Teacher_email;

        return $this;
    }

    public function getTeacherPass(): ?string
    {
        return $this->Teacher_pass;
    }

    public function setTeacherPass(string $Teacher_pass): self
    {
        $this->Teacher_pass = $Teacher_pass;

        return $this;
    }
}
