function buscador() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toUpperCase();
    let card = document.getElementsByClassName("product-card");
    for(i = 0; i < card.length; i++) {
        let textValue = card[i].getElementsByClassName("product-name")[0].textContent;
        if (textValue.toUpperCase().indexOf(filter) > -1) {
            card[i].style.display = "flex";
        } else {
            console.log(textValue);
            card[i].style.setProperty('display', 'none', 'important');
        }
    }
};

$('.editProductButton').click(function() {
    let idProducto = $(this).val();
    let nombre = $(this).attr('nombre');
    let descripcion = $(this).attr('descripcion');
    let precio = $(this).attr('precio').split(".");
    let precio1 = precio[0];
    let precio2 = precio[1];

    Swal.fire({
        title: "Editar usuario",
        html: `
        <input type="text" class="swal2-input" value="" id="input-nombre" style="width:70%;">
        <input type="number" min="0" class="swal2-input" value="" id="input-precio1" style="width:25%; margin: 10px 0">
        .
        <input type="number" min="0" max="99" class="swal2-input" value="" id="input-precio2" style="width:20%; margin: 10px 0">                
        `,
        confirmButtonText: "Editar",
        cancelButtonText: "Cancelar",
        showCancelButton: true,
        input: "textarea",
        inputValue: descripcion,
        inputAttributes: {
            id: "input-descripcion",
        },
        preConfirm: () => {
            let nombreInput = document.getElementById("input-nombre").value == "" ? nombre : document.getElementById("input-nombre").value;
            let descripcionInput = document.getElementById("input-descripcion").value == "" ? descripcion : document.getElementById("input-descripcion").value;
            let precioInput1 = document.getElementById("input-precio1").value == "" ? precio1 : document.getElementById("input-precio1").value;
            let precioInput2 = document.getElementById("input-precio2").value == "" ? precio2 : document.getElementById("input-precio2").value;
        
            return {nombreInput,descripcionInput,precioInput1, precioInput2};
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const editarAlert = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
            });
            editarAlert.fire({
                title: "¿Estás seguro?",
                html: `¿Estás seguro que quieres editar <span class="fw-bold">`+nombre+`</span>?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, editar",
                cancelButtonText: "No, cancelar",
                confirmButtonColor: "limegreen",
                cancelButtonColor: "brown",
                preConfirm: () => {
                    let nombreInput = result.value.nombreInput;
                    let descripcionInput = result.value.descripcionInput;
                    let precioInput1 = result.value.precioInput1;
                    let precioInput2 = result.value.precioInput2;

                    return { nombreInput, descripcionInput, precioInput1, precioInput2};
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    jQuery.ajax({
                        type: "GET",
                        url: "index.php?uri=product/edit",
                        dataType: "json",
                        data: { 
                             idProducto: idProducto,
                             nombre: result.value.nombreInput,
                             descripcion: result.value.descripcionInput,
                             precio: result.value.precioInput1+"."+result.value.precioInput2,
                        }
                    });
                    editarAlert.fire({
                        title: "Editado",
                        html: `Has editado <span class="fw-bold">`+nombre+`</span>`,
                        icon: "success"
                    }).then(() => location.reload(true));
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    editarAlert.fire({
                        title: "Cancelado",
                        text: "El usuario no ha sido editado",
                        icon: "error"
                    });
                }
            })
        };
    }); 
    document.getElementById("input-nombre").value = nombre;
    document.getElementById("input-precio1").value = precio1;
    document.getElementById("input-precio2").value = precio2;
});

$('.deleteProductButton').click(function() {
    var idProducto = $(this).val();
    var nombreProducto = $(this).attr('nombre');
       
    const borrarAlert = Swal.mixin({
       customClass: {
           confirmButton: "btn btn-success",
           cancelButton: "btn btn-danger"
        },
    });
    borrarAlert.fire({
        title: "¿Estás seguro?",
        html: `Estás a punto de eliminar el producto: <span class='fw-bold'>`+nombreProducto+` (ID de producto: `+idProducto+`)</span>`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, borrar",
        cancelButtonText: "No, cancelar",
        confirmButtonColor: "limegreen",
        cancelButtonColor: "brown"
    }).then((result) => {
        if (result.isConfirmed) {
            jQuery.ajax({
                type: "GET",
                url: "index.php?uri=product/delete",
                data: { parametro: idProducto}
            });
            borrarAlert.fire({
                title: "Eliminado",
                text: "Has eliminado a "+nombreProducto+" (ID de producto: "+idProducto+")",
                icon: "success"
            }).then(() => {location.reload(true)});
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            borrarAlert.fire({
                title: "Cancelado",
                text: "El producto no ha sido eliminado",
                icon: "error"
            });
        }
    })
});


$(document).on('click', '.increaseQuantity', function() {
    var idProducto = $(this).val();

    function increaseProductQuantity() {
        $.ajax({
            url: 'index.php?uri=cart/increaseProductQuantity',
            type: 'GET',
            data: {parametro: idProducto},
            success: function () {
                console.log("Se ha aumentado en 1 las unidades del producto "+idProducto);
                $('#cartButton').trigger('click');
            },
            error: function (xhr, status, error) {
                console.error('No se pudo aumentar las unidades del producto '+idProducto+". Error: "+error);
            }
        })
    }
    increaseProductQuantity();
});

$(document).on('click', '.decreaseQuantity', function() {
    var idProducto = $(this).val();

    function decreaseProductQuantity() {
        $.ajax({
            url: 'index.php?uri=cart/decreaseProductQuantity',
            type: 'GET',
            data: {parametro: idProducto},
            success: function () {
                console.log("Se ha reducir en 1 las unidades del producto "+idProducto);
                $('#cartButton').trigger('click');
            },
            error: function (xhr, status, error) {
                console.error('No se pudo reducir las unidades del producto '+idProducto+". Error: "+error);
            }
        })
    }
    decreaseProductQuantity();
});

function deleteCartItem(idProducto) {
    $.ajax({
    url: 'index.php?uri=cart/deleteCartProduct',
    type: 'GET',
    data: {parametro: idProducto},
    success: function () {
        console.log("Producto "+idProducto+" eliminado");
        $('#cartButton').trigger('click');
    },
    error: function (xhr, status, error) {
        console.error('No se pudo eliminar el producto '+idProducto+". Error: "+error);
    }
    })
}

$(document).on('click', '.deleteCartProduct', function() {
    var idProducto = $(this).val();
    deleteCartItem(idProducto);
});


$('.addToCartButton').click(function() {
    var idProducto = $(this).val();
    function addItemCart() {
        $.ajax({
            url: 'index.php?uri=cart/addToCart',
            type: 'GET',
            data: {parametro: idProducto},
            success: function() {
                $('#cartButton').trigger('click');
            },
            error: function (xhr, status, error) {
                console.log('Error al añadir el producto '+idProducto+' al carrito. Error: '+error);
            }
        });
    }
    addItemCart();
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
            cartContainer.html("<span class='fs-4 border-top-1 border-light'>Tu cesta parece estar vacía...</span>");
            return;
        }
    
        if (Array.isArray(cartItems)) {
            cartItems.forEach(item => {
                if (item.cantidad <= 0) {
                    deleteCartItem(item.idProducto);
                } else {
                    console.log(item.precioUnitario);
                cartContainer.append(
                    `<div href="#" class="list-group-item py-3 lh-sm" aria-current="true">
                        <div class="d-flex flex-column w-100 align-items-center justify-content-between">
                            <img class='img-fluid w-50 mb-2' src='${item.imagen}'>
                            <div class="d-flex justify-content-between w-100 mb-1">
                                <span class="fs-4 fw-bold text-start">${item.nombre}</span>
                                <span class="fs-4 fw-bold">${(item.precioUnitario * item.cantidad).toFixed(2)}€</span>
                            </div>
                            <div class="col-12 fs-5 mt-3 d-flex">
                                <div class="p-2 me-auto d-flex align-items-center">
                                    <span class="fw-bold me-1">Unidades: </span> ${item.cantidad}
                                    <button class="btn btn-primary btn-m decreaseQuantity fs-5 fw-bold d-flex align-items-center justify-content-center ms-2" value="${item.idProducto}" style="background-color: #6187EB; color: black; width:35px; height:35px">-</button>
                                    <button class="btn btn-warning btn-m increaseQuantity fs-5 fw-bold text-dark d-flex align-items-center justify-content-center ms-2" value="${item.idProducto}" style="background-color: #FF620E; color: white; width:35px; height:35px">+</button>
                                </div>
                                <button value='${item.idProducto}' class="btn btn-danger deleteCartProduct">Quitar del carrito</button>
                            </div>
                        </div>
                    </div>`
                )};
            });
        } else if (typeof cartItems === 'object') {
            cartContainer.append(
                `<div href="#" class="list-group-item py-3 lh-sm" aria-current="true">
                        <div class="d-flex flex-column w-100 align-items-center justify-content-between">
                            <img class='img-fluid w-50 mb-2' src='${item.imagen}'>
                            <div class="d-flex justify-content-between w-100 mb-1">
                                <span class="fs-4 fw-bold text-start">${item.nombre}</span>
                                <span class="fs-4 fw-bold">${(item.precioUnitario * item.cantidad).toFixed(2)}€</span>
                            </div>
                            <div class="col-12 fs-5 mt-3 d-flex">
                                <div class="p-2 me-auto d-flex align-items-center">
                                    <span class="fw-bold me-1">Unidades: </span> ${item.cantidad}
                                    <button class="btn btn-primary btn-m decreaseQuantity fs-5 fw-bold d-flex align-items-center justify-content-center ms-2" value="${item.idProducto}" style="background-color: #6187EB; color: black; width:35px; height:35px">-</button>
                                    <button class="btn btn-warning btn-m increaseQuantity fs-5 fw-bold text-dark d-flex align-items-center justify-content-center ms-2" value="${item.idProducto}" style="background-color: #FF620E; color: white; width:35px; height:35px">+</button>
                                </div>
                                <button value='${item.idProducto}' class="btn btn-danger deleteCartProduct">Quitar del carrito</button>
                            </div>
                        </div>
                    </div>`
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

let registerHTML = document.getElementById("register");
let loginHTML = document.getElementById("login");

function loginTransition() {
    loginHTML.classList.toggle("login-show");
    loginHTML.classList.toggle("login-hide");
    registerHTML.classList.toggle("register-hide");
    registerHTML.classList.toggle("register-show");
}

function registerTransition() {
    registerHTML.classList.toggle("register-hide");
    registerHTML.classList.toggle("register-show");
    loginHTML.classList.toggle("login-hide");
    loginHTML.classList.toggle("login-show");
}