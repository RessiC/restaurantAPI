<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 * @ORM\Table(name="admin_user")
 */
class AdminUser extends User
{
    const ROLE_ADMIN = ['ROLE_ADMIN'];

}
