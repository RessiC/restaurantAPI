<?php

namespace App\Entity;

use App\Repository\EmployeeUserRepository;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=EmployeeUserRepository::class)
 * @ORM\Table(name="employee_user")
 */
class EmployeeUser extends User
{
    const ROLE_EMPLOYEE = ['ROLE_EMPLOYEE'];

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="employees")
     */
    private $restaurant;

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

}
