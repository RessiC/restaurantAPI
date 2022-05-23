<?php

namespace App\Tests;

use App\Entity\Item;
use App\Entity\Product;
use App\Entity\Restaurant;
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
        $product4 = new Product();

        $item->addProduct($product1);
        $item->addProduct($product2);
        $item->addProduct($product3);
        $item->addProduct($product4);

        $this->assertContainsOnlyInstancesOf(Product::class, $item->getProducts());
    }
}
