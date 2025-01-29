<?php

class Cart extends EmptyModel {
    public function __construct() {
        parent::__construct('carrito', 'Usuarios_idUsuarios');
    }

    public function getCart() {
        try {
            return $this->getAll();
        } catch (Exception $e) {
            return false;
        }
    }
}