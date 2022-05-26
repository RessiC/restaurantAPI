<?php

namespace App\Tests\Restaurant;

use App\Entity\Restaurant\Item;
use App\Entity\Order;
use App\Entity\Restaurant\Product;
use App\Entity\Restaurant\Restaurant;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testCreate()
    {
        $item = new Item();

        $this->assertInstanceOf(Item::class, $item);
    }

    public function testName()
    {
        $item = new Item;
        $item->setName('item name 1');

        $this->assertSame('item name 1', $item->getName());
    }

    public function testPrice()
    {
        $item = new Item();
        $item->setPrice(200.05);

        $this->assertSame(200.05, $item->getPrice());
    }

    public function testRestaurant()
    {
        $item = new Item();
        $restaurant = new Restaurant();
        $item->setRestaurant($restaurant);

        $this->assertInstanceOf(Restaurant::class, $item->getRestaurant());
    }

    public function testProduct()
    {
        $item = new Item();

        $product1 = new Product();
        $product2 = new Product();
        $product3 = new Product();

        $item->addProduct($product1);
        $item->addProduct($product2);
        $item->addProduct($product3);

        $this->assertContainsOnlyInstancesOf(Product::class, $item->getProducts());
        $this->assertCount(3, $item->getProducts());
    }

    public function testOrder()
    {
        $item = new Item();
        $order1 = new Order();
        $order2 = new Order();
        $order3 = new Order();

        $item->addOrder($order1);
        $item->addOrder($order2);
        $item->addOrder($order3);

        $this->assertContainsOnlyInstancesOf(Order::class, $item->getOrders());
        $this->assertCount(3, $item->getOrders());
    }
}
