<?php

namespace App\Entity;

use App\Repository\CustomerUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerUserRepository::class)
 */
class CustomerUser extends User
{
    const CUSTOMER_ROLE = 'ROLE_CUSTOMER';

    public function __construct()
    {
        $this->roles = [self::CUSTOMER_ROLE];
    }

}
