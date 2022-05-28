<?php

namespace App\Service;

use App\Entity\Restaurant\Restaurant;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Order;

class OrderService
{
    private ManagerRegistry $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    public function postOrder(Order $order): Order
    {
        $order->setOrderAt(new \DateTime('now'));

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($order);
        $entityManager->flush();

        return $order;
    }

    public function editOrderForRestaurant(Order $existingOrder, Order $modifiedOrder, Restaurant $restaurant): Order
    {
        $existingOrder->setStatus($modifiedOrder->getStatus());
        $existingOrder->setReadyAt($modifiedOrder->getReadyAt());
        $existingOrder->setPaidAt($modifiedOrder->getPaidAt());

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($existingOrder);
        $entityManager->flush();

        return $existingOrder;
    }

    public function deleteOrder(Order $order)
    {
        $entityManager = $this->managerRegistry->getManager();
        $entityManager->remove($order);
        $entityManager->flush();
    }
}