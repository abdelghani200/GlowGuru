<?php

$data = new ProductController();
$products = $data->getAllProducts();

?>
<h1 class="text-center mt-5">gestion des produits</h1>
<div class="container mt-5">
    <form id="form" action="<?php echo BASE_URL ?>UpdateProduct" method="post">
        <input type="hidden" name="product_id" id="product_id">
    </form>
    <form id="delete_form" action="<?php echo BASE_URL ?>DeleteProduct" method="post">
        <input type="hidden" name="delete_product_id" id="delete_product_id">
    </form>
    <table class="table table-striped table-hover border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Nom Produit</th>
                <th scope="col">Price</th>
                <!-- <th scope="col">publié le</th> -->
                <th scope="col">description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <th scope="row"><?= $product["id"] ?></th>
                    <td>
                        <img style="width: 80px; height: 80px; border-radius: 50px;" src="./public/uploads/<?php echo $product["product_image"]; ?>" alt="" class="img-fluid">
                    </td>
                    <td><?= $product["product_title"] ?></td>
                    <td><?= $product["product_price"] ?></td>
                    <td><?= $product["product_description"] ?></td>
                    <td>
                        <a onclick="submitForm(<?php echo $product['id']; ?>)" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a onclick="deleteForm(<?php echo $product['id']; ?>)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>

            <?php endforeach  ?>
        </tbody>
    </table>

</div>