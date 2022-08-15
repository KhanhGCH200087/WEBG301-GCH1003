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

    public function getTeacher_name(): ?string
    {
        return $this->Teacher_name;
    }

    public function setTeacher_name(string $Teacher_name): self
    {
        $this->Teacher_name = $Teacher_name;

        return $this;
    }

    public function getTeacher_age(): ?int
    {
        return $this->Teacher_age;
    }

    public function setTeacher_age(?int $Teacher_age): self
    {
        $this->Teacher_age = $Teacher_age;

        return $this;
    }

    public function getTeacher_gender(): ?string
    {
        return $this->Teacher_gender;
    }

    public function setTeacher_gender(?string $Teacher_gender): self
    {
        $this->Teacher_gender = $Teacher_gender;

        return $this;
    }

    public function getTeacher_image(): ?string
    {
        return $this->Teacher_image;
    }

    public function setTeacher_image(?string $Teacher_image): self
    {
        $this->Teacher_image = $Teacher_image;

        return $this;
    }

    public function getTeacher_email(): ?string
    {
        return $this->Teacher_email;
    }

    public function setTeacher_email(string $Teacher_email): self
    {
        $this->Teacher_email = $Teacher_email;

        return $this;
    }

    public function getTeacher_pass(): ?string
    {
        return $this->Teacher_pass;
    }

    public function setTeacher_pass(string $Teacher_pass): self
    {
        $this->Teacher_pass = $Teacher_pass;

        return $this;
    }
}
