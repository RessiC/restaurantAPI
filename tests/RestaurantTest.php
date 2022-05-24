<?php

namespace App\Tests;

use App\Entity\EmployeeUser;
use App\Entity\Item;
use App\Entity\Order;
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

    public function testItem()
    {
        $restaurant = new Restaurant();

        $item1= new Item();
        $item2= new Item();
        $item3= new Item();


        $restaurant->addItem($item1);
        $restaurant->addItem($item2);
        $restaurant->addItem($item3);

        $this->assertContainsOnlyInstancesOf(Item::class, $restaurant->getItems());
        $this->assertCount(3, $restaurant->getItems());
    }

    public function testOrder()
    {
        $restaurant = new Restaurant();

        $order1 = new Order();
        $order2 = new Order();
        $order3 = new Order();

        $restaurant->addOrder($order1);
        $restaurant->addOrder($order2);
        $restaurant->addOrder($order3);

        $this->assertContainsOnlyInstancesOf(Order::class, $restaurant->getOrders());
        $this->assertCount(3, $restaurant->getOrders());
    }
}
