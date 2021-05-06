<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin extends User
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_admin;


    public function getTypeAdmin(): ?string
    {
        return $this->type_admin;
    }

    public function setTypeAdmin(string $type_admin): self
    {
        $this->type_admin = $type_admin;

        return $this;
    }
}
