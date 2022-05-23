<?php

namespace App\Tests;

use App\Entity\EmployeeUser;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class EmployeeUserTest extends TestCase
{
    public function test__construct()
    {
        $EmployeeUser = new EmployeeUser();

        $this->assertNotNull($EmployeeUser);
        $this->assertEquals(true, $EmployeeUser instanceof EmployeeUser);
        $this->assertEquals(true, $EmployeeUser instanceof User);
    }

    public function testRole()
    {
        $EmployeeUser = new EmployeeUser();
        $roleExcepted = ['ROLE_EMPLOYEE'];

        $this->assertSame($roleExcepted, $EmployeeUser->getRoles());
    }

    public function testEmail()
    {
        $EmployeeUser = new EmployeeUser();
        $EmployeeUser->setEmail('email@test.com');

        $this->assertSame('email@test.com', $EmployeeUser->getEmail());
    }
}
