<?php
// if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
if (isset($_POST["submit"])) {
    $product = new ProductController();
    $product->newProduct();
}
// } else {
//     Redirect::to("home");
// }
?>




<div class="container mt-5">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter un produit
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group form_add">
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="product_title[]" required autocomplete="off" placeholder="Titre" id="">
                            </div>
                            <div class="form-group mt-3">
                                <textarea row="5" cols="20" autocomplete="off" class="form-control" name="product_description[]" placeholder="Description" id=""></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <input type="number" autocomplete="off" class="form-control" name="product_price[]" placeholder="Prix" id="">
                            </div>
                            <div class="form-group mt-3">
                                <input type="file" class="form-control" name="image[]" multiple>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button name="submit" class="btn btn-primary">
                                Enregistrer
                            </button>
                            <button name="submit" id="btn" class="btn btn-warning ms-3">
                                Ajouter Produit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#btn').click(function(e) {
                        e.preventDefault();
                        $('.form_add').append(`
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="product_title[]" required autocomplete="off" placeholder="Titre">
                </div>
                <div class="form-group mt-3">
                    <textarea rows="5" cols="20" autocomplete="off" class="form-control" name="product_description[]" placeholder="Description"></textarea>
                </div>
                <div class="form-group mt-3">
                    <input type="number" autocomplete="off" class="form-control" name="product_price[]" placeholder="Prix">
                </div>
                <div class="form-group mt-3">
                    <input type="file" class="form-control" name="image[]" multiple>
                </div>
            `);
                    });
                });
            </script>

        </div>
    </div>
</div>