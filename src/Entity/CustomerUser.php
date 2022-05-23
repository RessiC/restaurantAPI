<?php

namespace App\Entity;

use App\Repository\CustomerUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerUserRepository::class)
 * @ORM\Table(name="customer_user")
 */
class CustomerUser extends User
{
    const ROLE_CUSTOMER = ['ROLE_CUSTOMER'];

}
