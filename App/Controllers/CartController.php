<?php

require_once "Models/Cart.php";

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new Cart();
    }

    public function view() {
        require "Views/cart/view.php";
    }

    public function getCart() {
        if (isset($_SESSION['user_id'])) {
            $productosCarrito = $this->cartModel->getById($_SESSION['user_id']);
            header("Content-Type: application/json");
            echo json_encode($productosCarrito);
            exit();
        } else if (isset($_COOKIE['user_id'])) {
            $productosCarrito = $this->cartModel->getById($_COOKIE['user_id']);
            header("Content-Type: application/json");
            echo json_encode($productosCarrito);
            exit();
        } else {
            return false;
        }
    }

    public function addToCart() {
        $this->cartModel->create(['Productos_idProductos' => 1, "Usuarios_idUsuarios" => $_SESSION['user_id'], "cantidad" => 1]);
    }
}