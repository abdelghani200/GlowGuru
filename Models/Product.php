<?php

class Product
{
    static public function getAll()
    {
        $statement = BD::connect()->prepare('SELECT * FROM products');
        $statement->execute();
        return $statement->fetchAll();
    }

    static public function getProductById($data)
    {
        $id = $data['id'];
        try {
            $statement = BD::connect()->prepare('SELECT * FROM products WHERE id = :id');
            $statement->execute(array(":id" => $id));
            $product = $statement->fetch(PDO::FETCH_OBJ);
            return $product;
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }

    

    static public function addProduct($data)
    {
        $data = $_POST;
        $count = count($_POST['product_title']);
        $results = array();
        for ($i = 0; $i < $count; $i++) {
            $stmt = BD::connect()->prepare('INSERT INTO products (product_title, product_description, product_image, product_price) 
            VALUES (:product_title, :product_description, :product_image, :product_price)');
            $stmt->bindParam(':product_title', $data['product_title'][$i]);
            $stmt->bindParam(':product_description', $data['product_description'][$i]);
            $stmt->bindParam(':product_image', $data['product_image'][$i]);
            $stmt->bindParam(':product_price', $data['product_price'][$i]);
            if ($stmt->execute()) {
                $results[] = 'ok';
            } else {
                $results[] = 'error';
            }
        }
        return $results;
    }

    static public function Total(){
        $stmt = BD::connect()->prepare("SELECT COUNT(*) FROM products");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    static public function MaxPrice(){
        $stmt = BD::connect()->prepare("SELECT   MAX(product_price) FROM products");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    static public function MinPrice(){
        $stmt = BD::connect()->prepare("SELECT  MIN(product_price) FROM products");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    static public function editProduct($data)
    {
        $stmt = BD::connect()->prepare('UPDATE products SET 
                product_title = :product_title,
                product_description=:product_description,
                product_image=:product_image,
                product_price=:product_price
                WHERE id=:id
        ');
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':product_title', $data['product_title']);
        $stmt->bindParam(':product_description', $data['product_description']);
        $stmt->bindParam(':product_image', $data['product_image']);
        $stmt->bindParam(':product_price', $data['product_price']);
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    static public function deleteProduct($data)
    {
        $id = $data['id'];
        try {
            $stmt = BD::connect()->prepare('DELETE FROM products WHERE id = :id');
            $stmt->execute(array(":id" => $id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $ex) {
            echo "erreur " . $ex->getMessage();
        }
    }
}
