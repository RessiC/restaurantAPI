<?php

namespace App\Service;

use App\Entity\Restaurant\Item;
use App\Entity\Restaurant\Restaurant;
use Doctrine\Persistence\ManagerRegistry;

class ItemService
{
    private ManagerRegistry $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    public function createItemForRestaurant(Item $item, Restaurant $restaurant)
    {
        $item->setRestaurant($restaurant);

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($item);
        $entityManager->flush();
    }

    public function editItemForRestaurant(Item $existingItem, Item $modifiedItem, Restaurant $restaurant)
    {
        $existingItem->setName($modifiedItem->getName());
        $existingItem->setRestaurant($restaurant);

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($existingItem);
        $entityManager->flush();
    }

    public function deleteItem(Item $item)
    {
        $entityManager = $this->managerRegistry->getManager();
        $entityManager->remove($item);
        $entityManager->flush();
    }

}