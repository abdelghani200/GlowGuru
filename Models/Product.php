<?php

class Product
{
    static public function getAll()
    {
        $statement = BD::connect()->prepare('SELECT * FROM products');
        $statement->execute();
        return $statement->fetchAll();
    }

    static public function addProduct($data)
    {
        $stmt = BD::connect()->prepare('INSERT INTO products (product_title
        ,product_description,product_quantity,product_image,
        product_price,old_price,short_desc,product_category_id)
        VALUES (:product_title,:product_description,:product_quantity,:product_image,
        :product_price,:old_price,:short_desc,:product_category_id)');
        $stmt->bindParam(':product_title', $data['product_title']);
        $stmt->bindParam(':product_description', $data['product_description']);
        $stmt->bindParam(':product_quantity', $data['product_quantity']);
        $stmt->bindParam(':product_image', $data['product_image']);
        $stmt->bindParam(':product_price', $data['product_price']);
        $stmt->bindParam(':old_price', $data['old_price']);
        $stmt->bindParam(':short_desc', $data['short_desc']);
        $stmt->bindParam(':product_category_id', $data['product_category_id']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
}
