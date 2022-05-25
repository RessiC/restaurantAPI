<?php

namespace App\Entity\User;

use App\Repository\User\ManagerUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ManagerUserRepository::class)
 * @ORM\Table(name="manager_user")
 */
class ManagerUser extends EmployeeUser
{
    const ROLE_MANAGER = ['ROLE_MANAGER'];

}
