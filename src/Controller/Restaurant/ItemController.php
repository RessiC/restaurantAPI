<?php

namespace App\Controller\Restaurant;

use App\Entity\Restaurant\Item;
use App\Entity\Restaurant\Restaurant;
use App\Service\ItemService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ItemController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/restaurants/{id}/items", name="restaurant_items_get", requirements={"id"="\d+"})
     * @Rest\View()
     */
    public function getItemsByRestaurant(Restaurant $restaurant)
    {
        return $restaurant->getItems();
    }

    /**
     * @Rest\Post("/restaurants/{id}/items", name="restaurant_item_post", requirements={"id"="\d+"})
     * @ParamConverter("item", converter="fos_rest.request_body")
     * @Rest\View()
     */
    public function postItemForRestaurant(Restaurant $restaurant, Item $item, ItemService $itemService): Item
    {
        $itemService->createItemForRestaurant($item, $restaurant);
        return $item;
    }

    /**
     * @Rest\Get("/restaurants/{id}/items/{item}", name="restaurant_item_get", requirements={"id"="\d+", "item"="\d+"})
     * @Rest\View()
     */
    public function getItemByRestaurant(Restaurant $restaurant, Item $item)
    {
        return $item;
    }

    /**
     * @Rest\Put("/restaurants/{id}/test/{item}", name="restaurant_item_edit", requirements={"id"="\d+", "item"="\d+"})
     * @ParamConverter("item", class="App\Entity\Restaurant\Item", converter="fos_rest.request_body")
     * @Rest\View()
     */
    public function editItemForRestaurant(Restaurant $restaurant, Item $existingItem, Item $item, ItemService $itemService)
    {
        //class not found with 2 items (existing and given), ParamConverter error, same issue with @Entity annotation.
    }

    /**
     * @Rest\Delete("restaurants/{id}/items/{item}", name="restaurant_item_delete", requirements={"id"="\d+", "item"="\d+"})
     * @Rest\View()
     */
    public function deleteItem(Restaurant $restaurant, Item $item, ItemService $itemService)
    {
        //todo check if $restaurant has $item
        $itemService->deleteItem($item);
    }
}