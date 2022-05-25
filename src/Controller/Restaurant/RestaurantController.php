<?php

namespace App\Controller\Restaurant;

use App\Entity\Restaurant\Restaurant;
use App\Service\RestaurantService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class RestaurantController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/restaurants", name="restaurant_get_all")
     * @Rest\View()
     */
    public function getRestaurants(RestaurantService $restaurantService)
    {
        return $restaurantService->getRestaurants();
    }

    /**
     * @Rest\Get("/restaurants/{id}", name="restaurant_get", requirements={"id"="\d+"})
     * @Rest\View()
     */
    public function getRestaurant(Restaurant $restaurant): Restaurant
    {
        return $restaurant;
    }

    /**
     * @Rest\Post("/restaurants", name="restaurant_post")
     * @ParamConverter("restaurant", converter="fos_rest.request_body")
     * @Rest\View()
     */
    public function postRestaurant(Restaurant $restaurant, RestaurantService $restaurantService): Restaurant
    {
        $restaurantService->createRestaurant($restaurant);
        return $restaurant;
    }

    /**
     * @Rest\Put("/restaurants/{id}", name="restaurant_edit", requirements={"id"="\d+"})
     * @ParamConverter("restaurant", converter="fos_rest.request_body")
     * @Rest\View()
     */
    public function editRestaurant(Restaurant $existingRestaurant, Restaurant $restaurant, RestaurantService $restaurantService): Restaurant
    {
        $restaurantService->editRestaurant($existingRestaurant, $restaurant);
        return $existingRestaurant;
    }

    /**
     * @Rest\Delete("/restaurants/{id}", name="restaurant_delete")
     * @Rest\View()
     */
    public function deleteRestaurant(Restaurant  $restaurant, RestaurantService $restaurantService)
    {
        $restaurantService->deleteRestaurant($restaurant);
    }
}
