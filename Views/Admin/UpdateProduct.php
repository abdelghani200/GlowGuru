<?php

$productToUpdate = new ProductController();
$productToUpdate = $productToUpdate->getProduct();
if (isset($_POST["submit"])) {
    $product = new ProductController();
    $product->updateProduct();
}

?>

<div class="container mt-5">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Modifier un produit
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="product_title" required autocomplete="off" placeholder="Titre" value="<?php echo $productToUpdate->product_title; ?>">
                        </div>
                        <div class="form-group">
                            <textarea row="5" cols="20" autocomplete="off" class="form-control" name="product_description" placeholder="Description" id=""><?php echo $productToUpdate->product_description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" class="form-control" name="product_price" placeholder="Prix" value="<?php echo $productToUpdate->product_price; ?>">
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo $productToUpdate->id; ?>">
                        <input type="hidden" name="product_current_image" value="<?php echo $productToUpdate->product_image; ?>">
                        <div class="form-group">
                        <img src="./public/uploads/<?php echo $productToUpdate->product_image; ?>" width="400" height="400" alt="" class="img-fluid rounded">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group mt-3">
                            <button name="submit" class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>