<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Service\Admin\RestaurantService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

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
     * @Rest\Delete("/restaurants/{id}", name="restaurant_delete")
     * @Rest\View()
     */
    public function deleteRestaurant(Restaurant  $restaurant, RestaurantService $restaurantService)
    {
        $restaurantService->deleteRestaurant($restaurant);
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
     * @Rest\Put("/restaurants/{id}", name="restaurant_edit", requirements={"id"="\d+"})
     * @ParamConverter("restaurant", converter="fos_rest.request_body")
     * @Rest\View()
     */
    public function editRestaurant(Restaurant $existingRestaurant, Restaurant $restaurant, RestaurantService $restaurantService): Restaurant
    {
        $restaurantService->editRestaurant($existingRestaurant, $restaurant);
        return $existingRestaurant;
    }
}
