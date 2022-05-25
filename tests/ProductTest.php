<?php

namespace App\Tests;

use App\Entity\Item;
use App\Entity\Product;
use App\Entity\Restaurant\Restaurant;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCreate()
    {
        $product = new Product();

        $this->assertInstanceOf(Product::class, $product);
    }

    public function testName()
    {
        $product = new Product();
        $product->setName('product name 1');

        $this->assertSame('product name 1', $product->getName());
    }

    public function testRestaurant()
    {
        $product = new Product();
        $restaurant = new Restaurant();
        $product->setRestaurant($restaurant);

        $this->assertInstanceOf(Restaurant::class, $product->getRestaurant());
        $this->assertEquals($restaurant, $product->getRestaurant());
    }

    public function testItem()
    {
        $product = new Product();

        $item1 = new Item();
        $item2 = new Item();
        $item3 = new Item();

        $product->addItem($item1);
        $product->addItem($item2);
        $product->addItem($item3);

        $this->assertContainsOnlyInstancesOf(Item::class, $product->getItems());
        $this->assertCount(3, $product->getItems());
    }
}
