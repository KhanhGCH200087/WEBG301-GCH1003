<?php

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Sub_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Sub_description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubName(): ?string
    {
        return $this->Sub_name;
    }

    public function setSubName(string $Sub_name): self
    {
        $this->Sub_name = $Sub_name;

        return $this;
    }

    public function getSubDescription(): ?string
    {
        return $this->Sub_description;
    }

    public function setSubDescription(?string $Sub_description): self
    {
        $this->Sub_description = $Sub_description;

        return $this;
    }
}
