<?php

namespace App\Service;

use App\Entity\Restaurant\Restaurant;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Order;

class OrderService
{
    private ManagerRegistry $managerRegistry;

    public function postOrder(Order $order): Order
    {

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($order);
        $entityManager->flush();

        return $order;
    }
}