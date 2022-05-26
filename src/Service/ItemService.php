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

    public function  editItem2($item)
    {
        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($item);
        $entityManager->flush();
    }
    public function editItem(Item $existingItem, Item $modifiedItem)
    {
        $existingItem->setName($modifiedItem->getName());
        $existingItem->setPrice($modifiedItem->getPrice());

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