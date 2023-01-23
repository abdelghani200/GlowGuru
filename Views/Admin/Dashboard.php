<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
    $product = new ProductController();
    $product->getTotalProduct();
    $product->getMaxProduct();
    $product->getMinProduct();
?>
    <div class="container">
        <div class="col-md-6 mx-auto mt-5">
            <div class="card bg-dark text-white" style="width:40rem">
                <img src="<?php echo BASE_URL; ?>public/images/Product.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <a class="card-text" href="<?php echo BASE_URL ?>products" style="text-decoration:none;color: black;font-size:1.5rem">Vous avez <span style="color:brown;font-size:22px"><?php echo 3 ?> </span>produits</a>
                    <p class="card-text text-secondary">Le maximum prix est <span style="color:red;font-size:22px"><?php echo $product->getMaxProduct()[0][0]; ?>€</span> et le minimum prix est <span style="color:black;font-size:22px"><?php echo $product->getMinProduct()[0][0]; ?>€</span></p>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    Redirect::to("accueil");
}
?>