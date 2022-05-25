<?php

namespace App\Service;

use App\Entity\Restaurant\Product;
use App\Entity\Restaurant\Restaurant;
use App\Repository\Restaurant\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductService
{
    private ProductRepository $productRepository;
    private ManagerRegistry $managerRegistry;


    public function __construct(ProductRepository $productRepository, ManagerRegistry $managerRegistry)
    {
        $this->productRepository = $productRepository;
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
    }
}