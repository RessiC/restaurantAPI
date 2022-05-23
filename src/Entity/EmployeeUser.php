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

    public function __construct()
    {
        return $this->roles = self::ROLE_EMPLOYEE;
    }
}
