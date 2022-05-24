<?php

namespace App\Service\Admin;

use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use Doctrine\Persistence\ManagerRegistry;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class RestaurantService
{
    private RestaurantRepository $restaurantRepository;
    private ManagerRegistry $managerRegistry;
    private SerializerInterface $serializer;

    /**
     * @param RestaurantRepository $restaurantRepository
     * @param ManagerRegistry $managerRegistry
     * @param SerializerInterface $serializer
     */
    public function __construct(
        RestaurantRepository $restaurantRepository,
        ManagerRegistry $managerRegistry,
        SerializerInterface $serializer
    ) {
        $this->restaurantRepository = $restaurantRepository;
        $this->managerRegistry = $managerRegistry;
        $this->serializer = $serializer;
    }

    public function createRestaurant(Request $request)
    {
        $restaurant = $this->serializer->deserialize($request->getContent(), Restaurant::class, "json");
        $entityManager = $this->managerRegistry->getManager();

        $entityManager->persist($restaurant);
        $entityManager->flush();
    }

    public function getRestaurant(int $id): string
    {
        $restaurant = $this->restaurantRepository->findOneBy(["id"=>$id]);

        return $this->serializer->serialize($restaurant, 'json');
    }

    public function getRestaurants(): string
    {
        $restaurants = $this->restaurantRepository->findAll();

        return $this->serializer->serialize($restaurants, 'json');
    }

    public function editRestaurant(int $id, Request $request): void
    {
        /** @var Restaurant $givenRestaurant */
        $givenRestaurant = $this->serializer->deserialize($request->getContent(), Restaurant::class, "json");
        $existingRestaurant = $this->restaurantRepository->findOneBy(["id" => $id]);

        $existingRestaurant->setName($givenRestaurant->getName());
        $existingRestaurant->setAddress($givenRestaurant->getAddress());

        $entityManager = $this->managerRegistry->getManager();
        $entityManager->persist($existingRestaurant);
        $entityManager->flush();
    }

    public function deleteRestaurant(int $id): void
    {
        $restaurant = $this->restaurantRepository->findOneBy(["id" => $id]);
        $entityManager = $this->managerRegistry->getManager();
        $entityManager->remove($restaurant);
        $entityManager->flush();
    }
}