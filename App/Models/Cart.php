<?php

class Cart extends EmptyModel {
    public function __construct() {
        parent::__construct('carrito', 'Usuarios_idUsuarios');
    }

    public function getCart($idUsuario) {
        $sql = "SELECT idProducto, nombre, imagen, precioUnitario, cantidad FROM productos INNER JOIN carrito ON productos.idProducto = carrito.Productos_idProductos WHERE carrito.Usuarios_idUsuarios = ?;";
        return $this->query($sql, [$idUsuario])->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Función para sacar si el usuario ya tiene ese producto en el carrito
     * @return void
     */
    public function getProductQuantity($idUsuario, $idProducto) {
        $sql = "SELECT cantidad FROM carrito WHERE Usuarios_idUsuarios = ? AND Productos_idProductos = ?;";
        
        return $this->query($sql, [$idUsuario, $idProducto])->fetchAll(PDO::FETCH_ASSOC)[0]['cantidad'];
    }

    public function updateProductQuantity($idUsuario,$idProducto, $cantidad) {
        $sql = "UPDATE {$this->table} SET cantidad = {$cantidad}  WHERE Productos_idProductos = {$idProducto} AND Usuarios_idUsuarios = {$idUsuario}";
        $this->query($sql);
    }

    public function deleteCartProduct($idUsuario, $idProducto) {
        $sql = "DELETE FROM {$this->table} WHERE Usuarios_idUsuarios = ? AND PRoductos_idProductos = ?";
        $this->query($sql, [$idUsuario, $idProducto]);
    }
}