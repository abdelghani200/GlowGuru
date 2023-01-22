<?php

require_once './autoload.php';


require_once("./Views/includes/header.php");

$home = new HomeController();

// $home->index("accueil");

$pages = ['produits', 'AddProduct', 'DeleteProduct', 'UpdateProduct', 'Dashboard','products','login','logout','accueil'];

if (isset($_GET['page'])) {
    if (in_array($_GET['page'], $pages)) {
        $page = $_GET['page'];
        if ($page === "Dashboard" || $page === "DeleteProduct" || $page === "UpdateProduct" || $page === "AddProduct" || $page === "products") {
            // if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
            $admin = new AdminController();
            $admin->index($page);
            // }else{
            //     include('Views/includes/404.php');
            // }
        } else {
            $home->index($page);
        }
    } else {
        include('Views/includes/404.php');
    }
} else {
    $home->index("accueil");
}



require_once("./Views/includes/footer.php");
