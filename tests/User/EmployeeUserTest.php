<?php

namespace App\Tests\User;

use App\Entity\User\EmployeeUser;
use App\Entity\Restaurant\Restaurant;
use App\Entity\User\User;
use PHPUnit\Framework\TestCase;

class EmployeeUserTest extends TestCase
{
    public function test__construct()
    {
        $EmployeeUser = new EmployeeUser();

        $this->assertNotNull($EmployeeUser);
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

        $this->assertEquals('email@test.com', $employeeUser->getEmail());
    }

    public function testRestaurant()
    {
        $employeeUser = new EmployeeUser();
        $restaurant = new Restaurant();

        $employeeUser->setRestaurant($restaurant);

        $this->assertEquals($restaurant, $employeeUser->getRestaurant());
        $this->assertInstanceOf(Restaurant::class, $employeeUser->getRestaurant());
    }
}
