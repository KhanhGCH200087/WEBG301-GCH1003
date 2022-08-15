<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Admin_user;

    #[ORM\Column(type: 'string', length: 255)]
    private $Admin_pass;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdminUser(): ?string
    {
        return $this->Admin_user;
    }

    public function setAdminUser(string $Admin_user): self
    {
        $this->Admin_user = $Admin_user;

        return $this;
    }

    public function getAdminPass(): ?string
    {
        return $this->Admin_pass;
    }

    public function setAdminPass(string $Admin_pass): self
    {
        $this->Admin_pass = $Admin_pass;

        return $this;
    }
}
