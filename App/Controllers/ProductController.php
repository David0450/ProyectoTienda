<?php

require_once "Models/Product.php";

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $products = $this->productModel->getProducts();
        require 'Views/products/product_view.php';

    }
    
    public function view() {
        require 'Views/products/product_view.php';
    }

    public function delete($idProducto) {
        try {
            $this->productModel->delete($idProducto);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update() {
        $idProducto = $_GET['idProducto'];
        $data['nombre'] = $_GET['nombre'];
        $data['descripcion'] = $_GET['descripcion'];
        $data['precioUnitario'] = $_GET['precio'];
        try {
            $this->productModel->update($data, $idProducto);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}