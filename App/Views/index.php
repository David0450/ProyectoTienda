<?php 
    include __DIR__ . '/layout/head.php';
    include __DIR__ . '/layout/header.php';
    include __DIR__ . '/layout/footer.php';
    include __DIR__ . '/layout/sidebar.php';
?>

<!DOCTYPE html>
<html class="h-100" lang='es'>
<?= $head ?>
<body class="h-100 text-center text-bg-dark">
    <?= $sidebar ?>
    <div id="contentDiv" class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <?= $header ?>
        <?= $content ?>
        <?= $footer ?>
    </div>
    <script>
        $('.addToCartButton').click(function() {
            var parametro = $(this).val();
            console.log(parametro);
            function addItemCart() {
                $.ajax({
                    url: 'index.php?uri=cart/addToCart&parametro='+parametro,
                    type: 'GET',
                
                });
            }
            addItemCart();
            $('#cartButton').trigger('click');
        });


        $('#cartButton').click(function() {

            $("#sidebar").css("transform", "translateX(0)");
            $("#modalCloseButton").css("display", "block");
            $("#contentDiv").css("overflowY", "hidden");
            
            function fetchCartItems() {
                $.ajax({
                    url: 'index.php?uri=cart/getCart',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log("Productos en el carrito:", data);
                        updateCartUI(data);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error al obtener el carrito:', error);
                    }
                });
            }
            
            function updateCartUI(cartItems) {
                let cartContainer = $("#cart-items");
                cartContainer.empty(); // Limpiar el contenido anterior
            
                if (cartItems.length === 0) {
                    cartContainer.html("<p>El carrito está vacío.</p>");
                    return;
                }
            
                if (Array.isArray(cartItems)) {
                    cartItems.forEach(item => {
                        cartContainer.append(
                            `<a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
                                <div class="d-flex flex-column w-100 align-items-center justify-content-between">
                                    <img class='img-fluid w-50 mb-2' src='${item.imagen}'>
                                    <div class="d-flex justify-content-between w-100 mb-1">
                                        <span class="fs-4 fw-bold text-start">${item.nombre}</span>
                                        <span class="fs-4 fw-bold">${item.precioUnitario}€</span>
                                    </div>
                                    <div class="fs-5 align-self-start mt-3"><span class="fw-bold">Cantidad:</span> ${item.cantidad}</div>
                                </div>
                            </a>`
                        );
                    });
                } else if (typeof cartItems === 'object') {
                    cartContainer.append(
                        `<a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <img class='h-25 w-25' src='${cartItems.imagen}'>
                                    <strong class="mb-1">${cartItems.nombre}</strong>
                                    <small>${cartItems.precio}</small>
                                </div>
                            <div class="col-10 mb-1 small">${cartItems.cantidad}</div>
                            </a>`
                        )
                } else {
                    cartContainer.html("<span class='fs-3 border-top-1 border-light'>Tu cesta parece estar vacía...</span>");
                }
            }
            // Llamar a la función para cargar los productos al cargar la página
            fetchCartItems();
        });

        $("#modalCloseButton").on("click", function() {
            $("#sidebar").css("transform", "translateX(100%");
            $("#modalCloseButton").css("display", "none");
            $("#contentDiv").css("overflowY", "scroll");
        })

        
    </script>
</body>
</html>