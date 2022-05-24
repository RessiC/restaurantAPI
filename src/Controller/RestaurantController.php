<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Service\Admin\RestaurantService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurants/{id}", name="restaurant_get", methods={"GET"})
     */
    public function getRestaurant(int $id, RestaurantService $restaurantService): Response
    {
        $restaurant = $restaurantService->getRestaurant($id);

        $response = new Response($restaurant);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/restaurants", name="restaurants_all", methods={"GET"})
     */
    public function getRestaurants(RestaurantService $restaurantService): Response
    {
        $restaurants = $restaurantService->getRestaurants();

        $response = new Response($restaurants);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/restaurants", name="restaurant_post", methods={"POST"})
     */
    public function postRestaurant(Request $request, RestaurantService $restaurantService): Response
    {
        $restaurantService->createRestaurant($request);

        return new Response('', Response::HTTP_CREATED);
    }

    /**
     * @Route("/restaurants/{id}", name="restaurant_edit", methods={"PUT"})
     */
    public function editRestaurant(int $id, Request $request, RestaurantService $restaurantService): Response
    {
        $restaurantService->editRestaurant($id, $request);

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/restaurants/{id}", name="restaurant_delete", methods={"DELETE"})
     */
    public function deleteRestaurant(int $id, RestaurantService $restaurantService): Response
    {
        $restaurantService->deleteRestaurant($id);
        return new Response('');
    }
}
