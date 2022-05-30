<?php

namespace App\Controller\Restaurant;

use App\Entity\Restaurant\Product;
use App\Entity\Restaurant\Restaurant;
use App\Service\ProductService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProductController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/api/restaurants/{id}/products", name="restaurant_products_get", requirements={"id"="\d+"})
     * @Rest\View()
     */
    public function getProductsByRestaurant(Restaurant $restaurant)
    {
        return $restaurant->getProducts();
    }

    /**
     * @Rest\Post("/restaurants/{id}/products", name="restaurant_product_post", requirements={"id"="\d+"})
     * @ParamConverter("product", converter="fos_rest.request_body")
     * @Rest\View()
     */
    public function postProductForRestaurant(Restaurant $restaurant, Product $product, ProductService $productService): Product
    {
        $productService->createProductForRestaurant($product, $restaurant);
        return $product;
    }

    /**
     * @Rest\Get("/restaurants/{id}/products/{product}", name="restaurant_product_get", requirements={"id"="\d+", "product"="\d+"})
     * @Rest\View()
     */
    public function getProductByRestaurant(Restaurant $restaurant, Product $product)
    {
        return $product;
    }

    /**
     * @Rest\Put("/restaurants/{id}/products/{product}", name="restaurant_product_edit", requirements={"id"="\d+", "product"="\d+"})
     * @ParamConverter("product", converter="fos_rest.request_body")
     * @Rest\View()
     */
    public function editProductForRestaurant(Restaurant $restaurant, Product $existingProduct, Product $product, ProductService $productService): Product
    {
        $productService->editProductForRestaurant($existingProduct, $product, $restaurant);
        return $existingProduct;
    }

    /**
     * @Rest\Delete("restaurants/{id}/products/{product}", name="restaurant_product_delete", requirements={"id"="\d+", "product"="\d+"})
     * @Rest\View()
     */
    public function deleteProduct(Restaurant $restaurant, Product $product, ProductService $productService)
    {
        //todo check if $restaurant has $product
        $productService->deleteProduct($product);
    }









}