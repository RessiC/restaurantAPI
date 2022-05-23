<?php

namespace App\Entity;

use App\Repository\CustomerUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerUserRepository::class)
 */
class CustomerUser extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setRoles(array $roles): CustomerUser
    {
        $this->roles = ['ROLE_CUSTOMER'];
        return $this;
    }
}
