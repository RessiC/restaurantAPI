<?php

namespace App\Service;

use App\Entity\Restaurant\Product;
use App\Entity\Restaurant\Restaurant;
use Doctrine\Persistence\ManagerRegistry;

class ProductService
{
    private ManagerRegistry $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    public function createProductForRestaurant(Product $product, Restaurant $restaurant)
    {
        $product->setRestaurant($restaurant);

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($product);
        $entityManager->flush();
    }

    public function editProductForRestaurant(Product $existingProduct, Product $modifiedProduct, Restaurant $restaurant)
    {
        $existingProduct->setName($modifiedProduct->getName());
        $existingProduct->setRestaurant($restaurant);

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($existingProduct);
        $entityManager->flush();
    }

    public function deleteProduct(Product $product)
    {
        $entityManager = $this->managerRegistry->getManager();
        $entityManager->remove($product);
        $entityManager->flush();
    }

}