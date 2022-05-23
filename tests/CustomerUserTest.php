<?php

namespace App\Tests;

use App\Entity\CustomerUser;
use PHPUnit\Framework\TestCase;

class CustomerUserTest extends TestCase
{
    public function testCreate()
    {
        $customerUser = new CustomerUser();
        $this->assertInstanceOf(CustomerUser::class, $customerUser);
    }

    public function testRole()
    {
        $customerUser = new CustomerUser();
        $roleExcepted = ['ROLE_CUSTOMER'];
        $this->assertSame($roleExcepted, $customerUser->getRoles());
    }

    public function testEmail()
    {
        $customerUser = new CustomerUser();
        $customerUser->setEmail('email@test.com');
        $this->assertSame('email@test.com', $customerUser->getEmail(), 'assert is same');
    }
}
