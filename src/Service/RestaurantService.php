<?php

namespace App\Service;

use App\Entity\Restaurant\Restaurant;
use App\Repository\Restaurant\RestaurantRepository;
use Doctrine\Persistence\ManagerRegistry;

class RestaurantService
{
    private RestaurantRepository $restaurantRepository;
    private ManagerRegistry $managerRegistry;

    public function __construct(RestaurantRepository $restaurantRepository, ManagerRegistry $managerRegistry)
    {
        $this->restaurantRepository = $restaurantRepository;
        $this->managerRegistry = $managerRegistry;
    }

    public function createRestaurant(Restaurant $restaurant)
    {
        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($restaurant);
        $entityManager->flush();
    }

    public function getRestaurant(int $id): ?Restaurant
    {
        return $this->restaurantRepository->findOneBy(["id" => $id]);
    }

    public function getRestaurants(): array
    {
        return $this->restaurantRepository->findAllWithLimit(20);
    }

    public function editRestaurant(Restaurant $existingRestaurant, Restaurant $modifiedRestaurant)
    {
        $existingRestaurant->setAddress($modifiedRestaurant->getAddress());
        $existingRestaurant->setName($modifiedRestaurant->getName());

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($existingRestaurant);
        $entityManager->flush();
    }

    public function deleteRestaurant(Restaurant $restaurant): void
    {
        $entityManager = $this->managerRegistry->getManager();
        $entityManager->remove($restaurant);
        $entityManager->flush();
    }
}