<?php

class Product
{
    static public function getAll()
    {
        $statement = BD::connect()->prepare('SELECT * FROM products');
        $statement->execute();
        return $statement->fetchAll();
    }
}