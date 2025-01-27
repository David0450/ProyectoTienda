-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-01-2025 a las 10:47:36
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectotienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `Productos_idProductos` int NOT NULL,
  `Usuarios_idUsuarios` int NOT NULL,
  `cantidad` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`Productos_idProductos`,`Usuarios_idUsuarios`),
  KEY `fk_Productos_has_Usuarios_Usuarios1_idx` (`Usuarios_idUsuarios`),
  KEY `fk_Productos_has_Usuarios_Productos_idx` (`Productos_idProductos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedidos` int NOT NULL AUTO_INCREMENT,
  `precioTotal` varchar(45) NOT NULL,
  `fechaPedido` timestamp NOT NULL,
  `Usuarios_idUsuarios` int NOT NULL,
  PRIMARY KEY (`idPedidos`),
  KEY `fk_Pedidos_Usuarios1_idx` (`Usuarios_idUsuarios`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

DROP TABLE IF EXISTS `pedidos_productos`;
CREATE TABLE IF NOT EXISTS `pedidos_productos` (
  `Pedidos_idPedidos` int NOT NULL,
  `Productos_idProductos` int NOT NULL,
  PRIMARY KEY (`Pedidos_idPedidos`,`Productos_idProductos`),
  KEY `fk_Pedidos_has_Productos_Productos1_idx` (`Productos_idProductos`),
  KEY `fk_Pedidos_has_Productos_Pedidos1_idx` (`Pedidos_idPedidos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idProductos` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precioUnitario` float NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`idProductos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int NOT NULL AUTO_INCREMENT,
  `email` varchar(75) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_roles`
--

DROP TABLE IF EXISTS `usuarios_roles`;
CREATE TABLE IF NOT EXISTS `usuarios_roles` (
  `idRol` int NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) NOT NULL,
  `Usuarios_idUsuarios` int NOT NULL,
  PRIMARY KEY (`idRol`),
  KEY `fk_Usuarios_Roles_Usuarios1_idx` (`Usuarios_idUsuarios`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
