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
        <?php if (count($products)) : ?>
            <?php foreach ($products as $product) :?>
                <div class="col-md-4 mb-2">
                    <div class="card h-100">
                        <img src="./public/uploads/<?php echo $product["product_image"]; ?>" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center ProductName"><?php echo $product["product_title"] ?></h5>
                            <p class="card-text text-center text-secondary"><td><?php echo substr($product["product_description"],0,20);?></td></p>
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
