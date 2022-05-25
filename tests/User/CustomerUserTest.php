<?php

namespace App\Tests\User;

use App\Entity\User\CustomerUser;
use App\Entity\User\User;
use PHPUnit\Framework\TestCase;

class CustomerUserTest extends TestCase
{
    public function test__construct()
    {
        $customerUser = new CustomerUser();

        $this->assertNotNull($customerUser);
        $this->assertEquals(true, $customerUser instanceof CustomerUser);
        $this->assertEquals(true, $customerUser instanceof User);
    }

    public function testRole()
    {
        $customerUser = new CustomerUser();
        $customerUser->setRoles(CustomerUser::ROLE_CUSTOMER);

        $this->assertSame(CustomerUser::ROLE_CUSTOMER, $customerUser->getRoles());
    }

    public function testEmail()
    {
        $customerUser = new CustomerUser();
        $customerUser->setEmail('email@test.com');

        $this->assertSame('email@test.com', $customerUser->getEmail());
    }
}
