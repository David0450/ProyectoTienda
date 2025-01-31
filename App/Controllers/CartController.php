<?php

require_once "Models/Cart.php";
require_once "Models/Product.php";

class CartController {
    private $cartModel;
    private $productModel;

    public function __construct() {
        $this->cartModel = new Cart();
        $this->productModel = new Product();
    }

    public function view() {
        require "Views/cart/view.php";
    }

    public function getCart() {
        if (isset($_SESSION['user_id'])) {
            $productosCarrito = $this->cartModel->getCart($_SESSION['user_id']);
            header("Content-Type: application/json");
            echo json_encode($productosCarrito);
            exit();
        } else if (isset($_COOKIE['user_id'])) {
            $productosCarrito = $this->cartModel->getCart($_COOKIE['user_id']);
            header("Content-Type: application/json");
            echo json_encode($productosCarrito);
            exit();
        } else {
            return false;
        }
/*
        $productosCarrito = $this->cartModel->getUserCart($this->productModel);
        header("Content-Type: application/json");
        echo json_encode($productosCarrito);
        exit();
        */
    }

    public function addToCart($idProducto) {
        if(isset($_SESSION['user_id'])) {
            $cantidadProducto = $this->cartModel->getProductQuantity($_SESSION['user_id'], $idProducto) ?? '';
        }
        if (is_int($cantidadProducto)) {
            $this->cartModel->updateProductQuantity($_SESSION['user_id'],$idProducto, $cantidadProducto+1);
        } else {
            $this->cartModel->create(['Productos_idProductos' => $idProducto, "Usuarios_idUsuarios" => $_SESSION['user_id'], "cantidad" => $cantidadProducto]);
        }
    }
}