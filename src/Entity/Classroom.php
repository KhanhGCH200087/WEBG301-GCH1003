<?php

namespace App\Entity;

use App\Repository\ClassroomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassroomRepository::class)]
class Classroom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Class_name;

    #[ORM\Column(type: 'text', nullable: true)]
    private $Class_description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $Class_quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClass_name(): ?string
    {
        return $this->Class_name;
    }

    public function setClass_name(string $Class_name): self
    {
        $this->Class_name = $Class_name;

        return $this;
    }

    public function getClass_description(): ?string
    {
        return $this->Class_description;
    }

    public function setClass_description(?string $Class_description): self
    {
        $this->Class_description = $Class_description;

        return $this;
    }

    public function getClass_quantity(): ?int
    {
        return $this->Class_quantity;
    }

    public function setClass_quantity(?int $Class_quantity): self
    {
        $this->Class_quantity = $Class_quantity;

        return $this;
    }
}
