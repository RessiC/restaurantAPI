<?php

namespace App\Tests;

use App\Entity\Product;
use App\Entity\Restaurant;
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
    }
}
