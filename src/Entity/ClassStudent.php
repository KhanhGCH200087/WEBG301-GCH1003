<?php

namespace App\Entity;

use App\Repository\ClassStudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassStudentRepository::class)]
class ClassStudent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: Classroom::class, inversedBy: 'classStudents')]
    private $ID_Class;

    #[ORM\ManyToMany(targetEntity: Student::class, inversedBy: 'classStudents')]
    private $ID_Student;

    #[ORM\ManyToMany(targetEntity: ClassManagement::class, mappedBy: 'ID_ClassStudent')]
    private $classManagement;

    public function __construct()
    {
        $this->ID_Class = new ArrayCollection();
        $this->ID_Student = new ArrayCollection();
        $this->classManagement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Classroom>
     */
    public function getIDClass(): Collection
    {
        return $this->ID_Class;
    }

    public function addIDClass(Classroom $iDClass): self
    {
        if (!$this->ID_Class->contains($iDClass)) {
            $this->ID_Class[] = $iDClass;
        }

        return $this;
    }

    public function removeIDClass(Classroom $iDClass): self
    {
        $this->ID_Class->removeElement($iDClass);

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getIDStudent(): Collection
    {
        return $this->ID_Student;
    }

    public function addIDStudent(Student $iDStudent): self
    {
        if (!$this->ID_Student->contains($iDStudent)) {
            $this->ID_Student[] = $iDStudent;
        }

        return $this;
    }

    public function removeIDStudent(Student $iDStudent): self
    {
        $this->ID_Student->removeElement($iDStudent);

        return $this;
    }

    /**
     * @return Collection<int, ClassManagement>
     */
    public function getClassManagement(): Collection
    {
        return $this->classManagement;
    }

    public function addClassManagement(ClassManagement $classManagement): self
    {
        if (!$this->classManagement->contains($classManagement)) {
            $this->classManagement[] = $classManagement;
            $classManagement->addIDClassStudent($this);
        }

        return $this;
    }

    public function removeClassManagement(ClassManagement $classManagement): self
    {
        if ($this->classManagement->removeElement($classManagement)) {
            $classManagement->removeIDClassStudent($this);
        }

        return $this;
    }
}
