<?php

namespace App\Tests;

use App\Entity\EmployeeUser;
use App\Entity\Product;
use App\Entity\Restaurant;
use PHPUnit\Framework\TestCase;

class RestaurantTest extends TestCase
{
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

        $restaurant->addEmployee($employeeUser1);
        $restaurant->addEmployee($employeeUser2);
        $restaurant->addEmployee($employeeUser3);

        $this->assertContainsOnlyInstancesOf(EmployeeUser::class, $restaurant->getEmployees());
        $this->assertCount(3, $restaurant->getEmployees());
    }

    public function testProduct()
    {
        $restaurant = new Restaurant();

        $product1 = new Product();
        $product2 = new Product();
        $product3 = new Product();

        $restaurant->addProduct($product1);
        $restaurant->addProduct($product2);
        $restaurant->addProduct($product3);

        $this->assertContainsOnlyInstancesOf(Product::class, $restaurant->getProducts());
        $this->assertCount(3, $restaurant->getProducts());
    }
}
