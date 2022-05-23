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
        $employeeUser = new EmployeeUser();
        $employeeUser->setRoles(EmployeeUser::ROLE_EMPLOYEE);

        $this->assertSame(EmployeeUser::ROLE_EMPLOYEE, $employeeUser->getRoles());
    }

    public function testEmail()
    {
        $employeeUser = new EmployeeUser();
        $employeeUser->setEmail('email@test.com');

        $this->assertSame('email@test.com', $employeeUser->getEmail());
    }
}
