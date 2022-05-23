<?php

namespace App\Entity;

use App\Repository\CustomerUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerUserRepository::class)
 */
class CustomerUser extends User
{
    const ROLE_CUSTOMER = ['ROLE_CUSTOMER'];

    public function __construct()
    {
        $this->roles = self::ROLE_CUSTOMER;
    }

}
