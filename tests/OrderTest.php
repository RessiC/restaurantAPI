<?php

namespace App\Tests;

use App\Entity\CustomerUser;
use App\Entity\Item;
use App\Entity\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testCreate()
    {
        $order = new Order();
        $customerUser = new CustomerUser();
        $orderAt = new \DateTime('2022-01-01');

        $order->setOrderAt($orderAt);
        $order->setCustomerUser($customerUser);

        $this->assertSame($orderAt, $order->getOrderAt());
        $this->assertInstanceOf(Order::class, $order);
        $this->assertInstanceOf(CustomerUser::class, $customerUser);
        $this->assertInstanceOf(\DateTime::class, $orderAt);
    }

    public function testItems()
    {
        $order = new Order();

        $item1 = new Item();
        $item2 = new Item();
        $item3 = new Item();

        $order->addItem($item1);
        $order->addItem($item2);
        $order->addItem($item3);

        $this->assertContainsOnlyInstancesOf(Item::class, $order->getItems());
        $this->assertCount(3, $order->getItems());
    }

    public function testReadyAt()
    {
        $order = new Order;
        $readyAt = new \DateTime('now');
        $order->setReadyAt($readyAt);

        $this->assertSame($readyAt, $order->getReadyAt());
        $this->assertInstanceOf(\DateTime::class, $readyAt);
    }

    public function testPaidAt()
    {
        $order = new Order;
        $paidAt = new \DateTime('now');
        $order->setPaidAt($paidAt);

        $this->assertSame($paidAt, $order->getPaidAt());
        $this->assertInstanceOf(\DateTime::class, $paidAt);
    }

    public function testStatus()
    {
        $order = new Order;
        $order->setStatus('paid');

        $this->assertSame('paid', $order->getStatus());
    }
}
