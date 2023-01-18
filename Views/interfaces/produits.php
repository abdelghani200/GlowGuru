<?php



$data = new ProductController();
$products = $data->getAllProducts();
// var_dump($products);


?>



<h3 class="text-center text-secondary mt-3">Bienvenue dans notre platforme !! (👋)</h3>

<div class="container">
    <div class="btn-search">
        <input type="text" placeholder="Search For Product" class="search" style="transition: all 0.3s ease-in-out;margin: 10px;width: 300px;height: 40px;font-size: 16px;color: #333;">
        <!-- <i class="fa-solid fa-magnifying-glass search" style="font-size: 20px;color: #ccc;"></i> -->
    </div>
</div>

<div class="container">
    <div class="row my-5">

        <div class="row">
            <?php if (count($products)) : ?>
                <?php foreach ($products as $product) :?>
                    <div class="col-md-4 mb-2">
                        <div class="card " style="width: 18rem;">
                            <img src="./public/uploads/<?php echo $product["product_image"]; ?>" alt="" class="img-fluid mt-3">
                            <div class="card-body">
                                <h5 class="card-title ProductName"><?php echo $product["product_title"] ?></h5>
                                <p class="card-text text-body"><?php echo $product["product_description"] ?></p>
                            </div>
                            <div class="card-footer">
                                <?php echo $product["product_price"] ?> <span style="color: blue;">€</span>
                            </div>
                            <button class="btn btn-info">More info —></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>