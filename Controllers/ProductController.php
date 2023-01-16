<?php


class ProductController
{
    public function getAllProducts()
    {
        $products = Product::getAll();
        return $products;
    }
}

