<?php

$data = new ProductController();
$products = $data->getAllProducts();
// var_dump($products);


?>



<h3 class="text-center text-secondary mt-3">Bienvenue dans notre platforme !! (👋)</h3>

<div class="container" id="container">
    <div class="btn-search">
        <input type="text" placeholder="Search For Product" class="search">
        <i class="fa fa-search" style="font-size: 20px;color: #ccc;"></i>
    </div>
</div>


<div class="container mt-5">
    <div class="row">
        <p class="not-found text-center text-danger fs-3" style="display:none;">Product not found !!</p>
        <?php if (count($products)) : ?>
            <?php foreach ($products as $product) : ?>
                <div class="col-md-4 mb-2">
                    <div class="card h-100" style="border-radius: 20px;">
                        <img src="./public/uploads/<?php echo $product["product_image"]; ?>" alt="" class="card-img-top" style="filter: drop-shadow(2px 4px 8px #585858);border-radius:20px">
                        <div class="card-body">
                            <h5 class="card-title text-center ProductName"><?php echo $product["product_title"] ?></h5>
                            <p class="card-text text-center text-secondary">
                                <td><?php echo $product["product_description"] ?></td>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span class="text-secondary"> <?php echo $product["product_price"] ?> €</span>
                            <a href="#" class="btn btn-info">More info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>