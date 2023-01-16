<?php



$data = new ProductController();
$products = $data->getAllProducts();
// var_dump($products);


?>



<h3 class="text-center text-secondary mt-3">Bienvenue dans notre platforme !! (👋)</h3>

<div class="container">
    <div class="row my-5">

        <div class="row">
            <?php if (count($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-4 mb-2">
                        <div class="card " style="width: 18rem;">
                            <img src="./public/uploads/<?php echo $product["product_image"]; ?>" alt="" class="img-fluid mt-3">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product["product_title"] ?></h5>
                                <p class="card-text"><?php echo $product["product_description"] ?></p>
                            </div>
                            <div class="card-footer">
                                <?php echo $product["product_price"] ?> <span style="color: blue;">Dh</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</div>
