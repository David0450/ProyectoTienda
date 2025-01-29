<?php

class Product extends EmptyModel {
    public function __construct() {
        parent::__construct('productos', 'idProducto');
    }

    public function getProducts() {
        try {
            return $this->getAll();
        } catch (Exception $e) {
            return false;
        }
    }
}