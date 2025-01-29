<?php

require_once "Models/Product.php";

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        require 'Views/products/view.php';

    }
    
    public function view() {
        $products = $this->productModel->getProducts();
        require 'Views/products/view.php';
    }
}