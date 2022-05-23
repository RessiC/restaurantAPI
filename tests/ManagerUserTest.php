<?php

namespace App\Tests;

use App\Entity\EmployeeUser;
use App\Entity\ManagerUser;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ManagerUserTest extends TestCase
{
    public function test__construct ()
    {
        $managerUser = new ManagerUser();
        
        $this->assertNotNull($managerUser);
        $this->assertEquals(true, $managerUser instanceof EmployeeUser);
        $this->assertEquals(true, $managerUser instanceof User);        
    }

    public function testRole()
    {
        $managerUser = new ManagerUser();
        $managerUser->setRoles(ManagerUser::ROLE_MANAGER);

        $this->assertSame(ManagerUser::ROLE_MANAGER, $managerUser->getRoles());
    }

    public function testEmail()
    {
        $managerUser = new ManagerUser();
        $managerUser->setEmail('email@test.com');

        $this->assertSame('email@test.com', $managerUser->getEmail());
    }
}
