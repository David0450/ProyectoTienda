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
        $('#cartButton').on("click", function() {
            $("#sidebar").css("transform", "translateX(0)");
            $("#modalCloseButton").css("display", "block");
            $("#contentDiv").css("overflowY", "hidden");
            
            function fetchCartItems() {
                alert("a");
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
                /*let cartContainer = $("#cart-items");
                cartContainer.empty(); // Limpiar el contenido anterior
            
                if (cartItems.length === 0) {
                    cartContainer.html("<p>El carrito está vacío.</p>");
                    return;
                }
            
                $.each(cartItems, function (index, item) {
                    cartContainer.append(`<p>${item.name} - $${item.price} x ${item.quantity}</p>`);
                });*/
                console.log("HECHO");
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