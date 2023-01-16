<?php


class  HomeController
{
    public function index($page)
    {
        include('Views/interfaces/' . $page . '.php');
    }

    public function newProduct()
    {
        if (isset($_POST["submit"])) {
            $data = array(
                "product_title" => $_POST["product_title"],
                "product_description" => $_POST["product_description"],
                "product_quantity" => $_POST["product_quantity"],
                "short_desc" => $_POST["short_desc"],
                "product_image" => $this->uploadPhoto(),
                "old_price" => $_POST["old_price"],
                "product_price" => $_POST["product_price"],
                "product_category_id" => $_POST["product_category_id"],
            );
            $result = Product::addProduct($data);
            if ($result === "ok") {
                Session::set("success", "Produit ajouté");
                Redirect::to("products");
            } else {
                echo $result;
            }
        }
    }

    public function uploadPhoto($oldImage = null)
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
}
