<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Restaurant\Restaurant;
use App\Service\OrderService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class OrderController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/restaurants/{id}/orders", name="restaurant_orders_get", requirements={"id"="\d+"})
     * @Rest\View()
     */
    public function getOrdersByRestaurant(Restaurant $restaurant)
    {
        return $restaurant->getOrders();
    }

    /**
     * @Rest\Get("/restaurants/{id}/orders/{order}", name="restaurant_order_get", requirements={"id"="\d+", "order"="\d+"})
     * @Rest\View();
     */
    public function getOrderByRestaurant(Restaurant $restaurant, Order $order)
    {
        return $order;
    }

    /**
     * @Rest\Post("/restaurants/{id}/orders/{order}", name="restaurant_order_post", requirements={"id"="\d+", "order"="\d+"})
     * @ParamConverter("order", converter="fos_rest.request_body")
     * @Rest\View()
     */
    public function postOrderForRestaurant(Restaurant $restaurant, Order $order, OrderService $orderService): Order
    {
        return $orderService->postOrder($order);
    }
}