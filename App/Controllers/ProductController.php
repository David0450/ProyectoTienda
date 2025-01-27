<?php

class ProductController {
    public function index() {
        echo "Hola desde el ProductController";
    }
    
    public function view() {
        require 'Views/products/view.php';
    }
}