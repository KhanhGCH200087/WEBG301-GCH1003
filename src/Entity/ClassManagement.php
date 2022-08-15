<?php

namespace App\Entity;

use App\Repository\ClassManagementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassManagementRepository::class)]
class ClassManagement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: ClassStudent::class, inversedBy: 'classManagement')]
    private $ID_ClassStudent;

    #[ORM\ManyToMany(targetEntity: Subject::class, inversedBy: 'classManagement')]
    private $ID_Subject;

    #[ORM\ManyToMany(targetEntity: Teacher::class, inversedBy: 'classManagement')]
    private $ID_Teacher;

    public function __construct()
    {
        $this->ID_ClassStudent = new ArrayCollection();
        $this->ID_Subject = new ArrayCollection();
        $this->ID_Teacher = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, ClassStudent>
     */
    public function getIDClassStudent(): Collection
    {
        return $this->ID_ClassStudent;
    }

    public function addIDClassStudent(ClassStudent $iDClassStudent): self
    {
        if (!$this->ID_ClassStudent->contains($iDClassStudent)) {
            $this->ID_ClassStudent[] = $iDClassStudent;
        }

        return $this;
    }

    public function removeIDClassStudent(ClassStudent $iDClassStudent): self
    {
        $this->ID_ClassStudent->removeElement($iDClassStudent);

        return $this;
    }

    /**
     * @return Collection<int, Subject>
     */
    public function getIDSubject(): Collection
    {
        return $this->ID_Subject;
    }

    public function addIDSubject(Subject $iDSubject): self
    {
        if (!$this->ID_Subject->contains($iDSubject)) {
            $this->ID_Subject[] = $iDSubject;
        }

        return $this;
    }

    public function removeIDSubject(Subject $iDSubject): self
    {
        $this->ID_Subject->removeElement($iDSubject);

        return $this;
    }

    /**
     * @return Collection<int, Teacher>
     */
    public function getIDTeacher(): Collection
    {
        return $this->ID_Teacher;
    }

    public function addIDTeacher(Teacher $iDTeacher): self
    {
        if (!$this->ID_Teacher->contains($iDTeacher)) {
            $this->ID_Teacher[] = $iDTeacher;
        }

        return $this;
    }

    public function removeIDTeacher(Teacher $iDTeacher): self
    {
        $this->ID_Teacher->removeElement($iDTeacher);

        return $this;
    }
}
