<?php

namespace App\Tests;

use App\Entity\EmployeeUser;
use App\Entity\Restaurant;
use PHPUnit\Framework\TestCase;

class RestaurantTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }

    public function testCreate()
    {
        $restaurant = new Restaurant();

        $this->assertInstanceOf(Restaurant::class, $restaurant);
    }

    public function testName()
    {
        $restaurant = new Restaurant();

        $restaurant->setName('nom du restaurant 1');
        $this->assertSame('nom du restaurant 1', $restaurant->getName());
    }

    public function testAddress()
    {
        $restaurant = new Restaurant();
        $restaurant->setAddress('21 avenue de la bas, 33000 bordeaux');

        $this->assertSame('21 avenue de la bas, 33000 bordeaux', $restaurant->getAddress());
    }

    public function testEmployees()
    {
        $restaurant = new Restaurant();

        $employeeUser1 = new EmployeeUser();
        $employeeUser2 = new EmployeeUser();
        $employeeUser3 = new EmployeeUser();
        $employeeUser4 = new EmployeeUser();

        $restaurant->addEmployee($employeeUser1);
        $restaurant->addEmployee($employeeUser2);
        $restaurant->addEmployee($employeeUser3);
        $restaurant->addEmployee($employeeUser4);

        $this->assertContainsOnlyInstancesOf(EmployeeUser::class, $restaurant->getEmployees());
    }
}
