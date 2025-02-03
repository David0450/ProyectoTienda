<?php ob_start(); ?>
<main class="px-3">
    <h1>Mi Proyecto de Tienda.</h1>
    <p class="lead">Este es mi proyecto de tienda, en el que podrás ver, editar y eliminar productos, también incluye funciones de carrito y usuario.</p>
    <p class="lead">
        <form action="" method="get">
            <button name="uri" value="products" type="submit" class="btn btn-lg btn-light fw-bold border-white bg-white">Productos</button>
        </form>
    </p>
  </main>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../index.php'; ?>