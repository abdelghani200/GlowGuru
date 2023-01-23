<?php


class ProductController
{
    public function getAllProducts()
    {
        $products = Product::getAll();
        return $products;
    }

    public function getProduct()
    {

        if (isset($_POST["product_id"])) {

            $data = array(
                'id' => $_POST["product_id"]
            );
            $product = Product::getProductById($data);
            return $product;
        }
    }

    public function getTotalProduct()
    {
        $products = Product::Total();
        return $products;
    }


    public function getMaxProduct()
    {
        $products = Product::MaxPrice();
        return $products;
    }


    public function getMinProduct()
    {
        $products = Product::MinPrice();
        return $products;
    }


    public function newProduct()
    {
        if (isset($_POST["submit"])) {
            $images = $this->uploadPhoto();
            $data = array();
            $results = array();

            for ($i = 0; $i < count($_POST["product_title"]); $i++) {
                $data[] = array(
                    "product_title" => $_POST["product_title"][$i],
                    "product_description" => $_POST["product_description"][$i],
                    "product_image" => $images[$i],
                    "product_price" => $_POST["product_price"][$i],
                );              
            }

            $stmt = BD::connect()->prepare('INSERT INTO products (product_title, product_description, product_image, product_price) VALUES (:product_title, :product_description, :product_image, :product_price)');

            foreach ($data as $product) {
                $stmt->bindParam(':product_title', $product['product_title']);
                $stmt->bindParam(':product_description', $product['product_description']);
                $stmt->bindParam(':product_image', $product['product_image']);
                $stmt->bindParam(':product_price', $product['product_price']);
                if ($stmt->execute()) {
                    $results[] = 'ok';
                } else {
                    $results[] = 'error';
                }
            }

            if (!in_array("error", $results)) {
                Session::set("success", "Produits ajoutés");
                Redirect::to("products");
            } else {
                echo $results;
            }
        }
    }

    



    public function updateProduct()
    {
        if (isset($_POST["submit"])) {
            $oldImage = $_POST["product_current_image"];
            $data = array(
                "id" => $_POST["product_id"],
                "product_title" => $_POST["product_title"],
                "product_description" => $_POST["product_description"],
                "product_image" => $this->uploadPhotoToUpdat($oldImage),
                "product_price" => $_POST["product_price"],
            );
            $result = Product::editProduct($data);
            if ($result === "ok") {
                Session::set("success", "Produit modifié");
                Redirect::to("products");
            } else {
                echo $result;
            }
        }
    }


    public function uploadPhoto($oldImages = null)
    {
        $dir = "public/uploads";
        $images = array();
        for ($i = 0; $i < count($_FILES["image"]["name"]); $i++) {
            $time = time();
            $name = str_replace(' ', '-', strtolower($_FILES["image"]["name"][$i]));
            $type = $_FILES["image"]["type"][$i];
            $ext = substr($name, strpos($name, '.'));
            $ext = str_replace('.', '', $ext);
            $name = preg_replace("/\.[^.\s]{3,4}$/", "", $name);
            $imageName = $name . '-' . $time . '.' . $ext;
            if (move_uploaded_file($_FILES["image"]["tmp_name"][$i], $dir . "/" . $imageName)) {
                $images[] = $imageName;
            } else {
                $images[] = $oldImages[$i];
            }
        }
        return $images;
    }


    public function uploadPhotoToUpdat($oldImage = null)
    {
        $dir = "public/uploads";
        $time = time();
        $name = str_replace(' ', '-', strtolower($_FILES["image"]["name"]));
        $type = $_FILES["image"]["type"];
        $ext = substr($name, strpos($name, '.'));
        $ext = str_replace('.', '', $ext);
        $name = preg_replace("/\.[^.\s]{3,4}$/", "", $name);
        $imageName = $name . '-' . $time . '.' . $ext;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $dir . "/" . $imageName)) {
            return $imageName;
        }
        return $oldImage;
    }



    public function removeProduct()
    {
        if (isset($_POST["delete_product_id"])) {
            $data = array(
                "id" => $_POST["delete_product_id"]
            );
            $result = Product::deleteProduct($data);
            if ($result === "ok") {
                Session::set("success", "Produit supprimé");
                Redirect::to("products");
            } else {
                echo $result;
            }
        }
    }
}
