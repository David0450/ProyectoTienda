<?php ob_start(); ?>
<main class="container gap-3 py-5">
    <div class="row gap-5">
        <?php foreach($products as $product) { ?>
            <div class="card col-lg-4 d-flex flex-column justify-content-between p-2 product-card" style="width: 18rem;">
                <img src="<?= $product['imagen'] ?>" class="" alt="...">
                <div class="card-body-bottom">
                    <p class="card-title fs-5 fw-bold product-name"><?= $product['nombre'] ?></p>
                    <p class="card-text"><?= $product['descripcion'] ?></p>
                    <p class="card-text fw-bold fs-5"><?= $product['precioUnitario'] ?>€</p>
                    <button value="<?= $product['idProducto']?>" class="btn fw-semibold bg-gradient addToCartButton" style="background-color: #FF620E;">Añadir al carrito</button>
                    <?php if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 1) {?>
                        <div class="d-flex justify-content-between mt-2 column-gap-6">
                            <button value="<?= $product['idProducto']?>" nombre="<?= $product['nombre']?>" precio="<?= $product['precioUnitario'] ?>" descripcion="<?= $product['descripcion']?>" class="btn fw-semibold col-5 btn-sm p-2 rounded-2 fs-6 bg-warning bg-gradient editProductButton">Editar</button>
                            <button value="<?= $product['idProducto']?>" nombre="<?= $product['nombre']?>" class="btn fw-semibold col-5 btn-sm p-2 rounded-2 fs-6 bg-danger bg-gradient deleteProductButton">Eliminar</button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../index.php'; ?>