-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 08:01 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frnkq_tp`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `role`, `username`, `accion`, `uri`, `ip`, `fecha`) VALUES
(1, 'mozo', 'jperez903', 'ActualizarPedido', '/pedidos/1', '', '2019-07-14 16:08:37'),
(2, '_', 'alberto', 'alberto', '/auth/login', '', '2019-07-14 16:12:47'),
(3, '_', 'alberto', 'LogIn', '/auth/login', '', '2019-07-14 16:13:16'),
(4, 'guest', 'alberto', 'LogIn', '/auth/login', '', '2019-07-14 16:36:57'),
(5, 'guest', 'alberto', 'LogIn', '/auth/login', '', '2019-07-14 16:36:58'),
(6, 'guest', 'alberto', 'LogIn', '/auth/login', '::1', '2019-07-14 16:38:02'),
(7, 'guest', 'alberto', 'LogIn', '/auth/login', '::1', '2019-07-14 16:48:33'),
(8, 'guest', 'alberto', 'LogIn', '/auth/login', '::1', '2019-07-14 16:48:44'),
(9, 'guest', 'fcanevali900', 'LogIn', '/auth/login', '::1', '2019-07-14 16:49:09'),
(10, 'guest', 'fcanevali900', 'LogIn', '/auth/login', '::1', '2019-07-14 16:59:56'),
(11, 'socio', 'fcanevali900', 'OperacionesCocina', '/listados/cocina', '::1', '2019-07-14 17:00:18'),
(12, 'socio', 'fcanevali900', 'OperacionesCocina', '/listados/cocina', '::1', '2019-07-14 17:00:34'),
(13, 'socio', 'fcanevali900', 'OperacionesCocina', '/listados/cocina', '::1', '2019-07-14 17:00:48'),
(14, 'socio', 'fcanevali900', 'OperacionesCocina', '/listados/cocina', '::1', '2019-07-14 17:01:07'),
(15, 'socio', 'fcanevali900', 'OperacionesCocina', '/listados/cocina', '::1', '2019-07-14 17:01:17'),
(16, 'socio', 'fcanevali900', 'OperacionesCocina', '/listados/cocina', '::1', '2019-07-14 17:01:21'),
(17, 'guest', 'aruiz908', 'LogIn', '/auth/login', '::1', '2019-07-14 17:02:06'),
(18, 'cervecero', 'aruiz908', 'ActualizarPedido', '/pedidos/11', '::1', '2019-07-14 17:02:17'),
(19, 'cervecero', 'aruiz908', 'ActualizarPedido', '/pedidos/11', '::1', '2019-07-14 17:02:41'),
(20, 'cervecero', 'aruiz908', 'ActualizarPedido', '/pedidos/11', '::1', '2019-07-14 17:03:04'),
(21, 'cervecero', 'aruiz908', 'ActualizarPedido', '/pedidos/11', '::1', '2019-07-14 17:03:39'),
(22, 'guest', 'psalde906', 'LogIn', '/auth/login', '::1', '2019-07-14 17:04:05'),
(23, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/11', '::1', '2019-07-14 17:04:10'),
(24, 'socio', 'fcanevali900', 'OperacionesCocina', '/listados/cocina', '::1', '2019-07-14 17:04:45'),
(25, 'socio', 'fcanevali900', 'OperacionesCocina', '/listados/cocina', '::1', '2019-07-14 17:04:57'),
(26, 'socio', 'fcanevali900', 'OperacionesCerveza', '/listados/cerveza', '::1', '2019-07-14 17:08:50'),
(27, 'socio', 'fcanevali900', 'OperacionesPorEmpleado', '/listados/empleado/psalde906', '::1', '2019-07-14 17:12:40'),
(28, 'socio', 'fcanevali900', 'OperacionesPorEmpleado', '/listados/empleado/psaldzxczcxz', '::1', '2019-07-14 17:12:44'),
(29, 'socio', 'fcanevali900', 'OperacionesPorEmpleado', '/listados/empleado/aruiz908', '::1', '2019-07-14 17:12:53'),
(30, 'socio', 'fcanevali900', 'OperacionesPorEmpleado', '/listados/empleado/aruiz908', '::1', '2019-07-14 17:13:54'),
(31, 'socio', 'fcanevali900', 'OperacionesPorEmpleado', '/listados/empleado/aruiz908', '::1', '2019-07-14 17:14:39'),
(32, 'socio', 'fcanevali900', 'OperacionesCerveza', '/listados/cerveza', '::1', '2019-07-14 17:14:46'),
(33, 'socio', 'fcanevali900', 'OperacionesCervezaEmpleado', '/listados/cerveza/aruiz908', '::1', '2019-07-14 17:21:39'),
(34, 'socio', 'fcanevali900', 'OperacionesCerveza', '/listados/cerveza', '::1', '2019-07-14 17:21:45'),
(35, 'guest', 'fcanevali900', 'LogIn', '/auth/login', '::1', '2019-07-15 16:03:20'),
(36, 'guest', 'jalberto902', 'LogIn', '/auth/login', '::1', '2019-07-15 16:07:32'),
(37, 'mozo', 'jalberto902', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:07:37'),
(38, 'guest', 'equito904', 'LogIn', '/auth/login', '::1', '2019-07-15 16:08:19'),
(39, 'bartender', 'equito904', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:08:24'),
(40, 'bartender', 'equito904', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:08:27'),
(41, 'bartender', 'equito904', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:08:30'),
(42, 'guest', 'psalde906', 'LogIn', '/auth/login', '::1', '2019-07-15 16:09:00'),
(43, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:09:05'),
(44, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/9', '::1', '2019-07-15 16:09:08'),
(45, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/9', '::1', '2019-07-15 16:09:10'),
(46, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/9', '::1', '2019-07-15 16:09:11'),
(47, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/9', '::1', '2019-07-15 16:09:12'),
(48, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/10', '::1', '2019-07-15 16:09:15'),
(49, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/10', '::1', '2019-07-15 16:09:16'),
(50, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/10', '::1', '2019-07-15 16:09:17'),
(51, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/11', '::1', '2019-07-15 16:09:19'),
(52, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/11', '::1', '2019-07-15 16:09:20'),
(53, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/11', '::1', '2019-07-15 16:09:21'),
(54, 'mozo', 'jalberto902', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:09:27'),
(55, 'mozo', 'jalberto902', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:09:28'),
(56, 'mozo', 'jalberto902', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:09:30'),
(57, 'cocinero', 'psalde906', 'ActualizarPedido', '/pedidos/10', '::1', '2019-07-15 16:09:53'),
(58, 'guest', 'alberto', 'LogIn', '/auth/login', '::1', '2019-07-15 16:18:01'),
(59, 'cliente', 'alberto', 'ListarPedido', '/pedido/al4', '::1', '2019-07-15 16:19:09'),
(60, 'cliente', 'alberto', 'ListarPedido', '/pedido/al4', '::1', '2019-07-15 16:19:27'),
(61, 'cliente', 'alberto', 'ListarPedido', '/pedido/al4', '::1', '2019-07-15 16:19:34'),
(62, 'mozo', 'jalberto902', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:22:54'),
(63, 'mozo', 'jalberto902', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:27:07'),
(64, 'mozo', 'jalberto902', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:27:36'),
(65, 'mozo', 'jalberto902', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:30:46'),
(66, 'mozo', 'jalberto902', 'ActualizarPedido', '/pedidos/4', '::1', '2019-07-15 16:35:45'),
(67, 'cliente', 'alberto', 'ListarPedido', '/pedido/al4', '::1', '2019-07-15 16:36:20'),
(68, 'cliente', 'alberto', 'ListarPedido', '/pedido/al4', '::1', '2019-07-15 17:11:24'),
(69, 'guest', 'alberto', 'LogIn', '/auth/login', '::1', '2019-07-15 17:28:03'),
(70, 'cliente', 'alberto', 'EnviarResena', '/pedido/al4', '::1', '2019-07-15 17:29:19'),
(71, 'cliente', 'alberto', 'EnviarResena', '/pedido/al4', '::1', '2019-07-15 17:29:33'),
(72, 'cliente', 'alberto', 'EnviarResena', '/pedido/al4', '::1', '2019-07-15 17:29:38'),
(73, 'cliente', 'alberto', 'EnviarResena', '/pedido/al4', '::1', '2019-07-15 17:34:13'),
(74, 'cliente', 'alberto', 'EnviarResena', '/pedido/al4', '::1', '2019-07-15 17:34:43'),
(75, 'cliente', 'alberto', 'EnviarResena', '/pedido/al4', '::1', '2019-07-15 17:55:13'),
(76, 'cliente', 'alberto', 'EnviarResena', '/pedido/al4', '::1', '2019-07-15 17:55:38'),
(77, 'cliente', 'alberto', 'EnviarResena', '/pedido/al4', '::1', '2019-07-15 17:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `audit_login`
--

CREATE TABLE `audit_login` (
  `id` int(11) NOT NULL,
  `role` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_login`
--

INSERT INTO `audit_login` (`id`, `role`, `username`, `active`, `fecha`) VALUES
(1, 'cliente', 'alberto', 1, '2019-07-14 16:48:44'),
(2, 'socio', 'fcanevali900', 1, '2019-07-14 16:49:09'),
(3, 'socio', 'fcanevali900', 1, '2019-07-14 16:59:56'),
(4, 'cervecero', 'aruiz908', 1, '2019-07-14 17:02:06'),
(5, 'cocinero', 'psalde906', 1, '2019-07-14 17:04:05'),
(6, 'socio', 'fcanevali900', 1, '2019-07-15 16:03:20'),
(7, 'mozo', 'jalberto902', 1, '2019-07-15 16:07:32'),
(8, 'bartender', 'equito904', 1, '2019-07-15 16:08:19'),
(9, 'cocinero', 'psalde906', 1, '2019-07-15 16:09:00'),
(10, 'cliente', 'alberto', 1, '2019-07-15 16:18:01'),
(11, 'cliente', 'alberto', 1, '2019-07-15 17:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `dni` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horario` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `dni`, `nombre`, `apellido`, `username`, `role`, `image`, `horario`) VALUES
(1, '39774900', 'franco', 'canevali', 'fcanevali900', 'socio', NULL, NULL),
(2, '39774902', 'Jorge', 'Alberto', 'jalberto902', 'mozo', NULL, NULL),
(3, '39774903', 'Juan', 'Perez', 'jperez903', 'mozo', NULL, NULL),
(4, '39774904', 'Estban', 'Quito', 'equito904', 'bartender', NULL, NULL),
(5, '39774905', 'Mariano', 'Rizzo', 'mrizzo905', 'bartender', NULL, NULL),
(6, '39774906', 'Pablo', 'Salde', 'psalde906', 'cocinero', NULL, NULL),
(7, '39774907', 'Ezequiel', 'Gonzalez', 'egonzalez907', 'cocinero', NULL, NULL),
(8, '39774908', 'Alejo', 'Ruiz', 'aruiz908', 'cervecero', NULL, NULL),
(9, '39774909', 'Matias', 'Hacha', 'mhacha909', 'cervecero', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `guid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mozoUsername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clienteUsername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaApertura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaCierre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productos` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `importe` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`id`, `guid`, `mozoUsername`, `clienteUsername`, `fechaApertura`, `fechaCierre`, `productos`, `importe`) VALUES
(1, 'C8840E6A-0681-48E2-A725-19B80456A5D5', 'jperez903', 'jorge', '2019-07-01 02:01:55', '2019-07-01 02:01:55', '[[1,2],[3,3],[5,4],[7,5]]', '-1'),
(2, '24E6D452-42CC-4BD0-B348-80F41B2B75CD', 'jperez903', 'alberto', '2019-07-01 02:15:53', '2019-07-01 02:15:53', '[[2,4],[1,5],[7,2],[3,4]]', '-1'),
(3, '266C1A0C-DA1C-4983-BA25-667488D21374', 'fcanevali900', 'alberto', '2019-07-09 17:33:02', '2019-07-09 17:33:02', '[[2,4],[1,5],[7,2],[3,4]]', '-1'),
(4, 'FC407D17-77AB-4FFD-A804-98DEF828919A', 'fcanevali900', 'alberto', '2019-07-09 17:35:38', '2019-07-15 16:35:45', '[[2,4],[1,5],[7,2],[3,4]]', '12600');

-- --------------------------------------------------------

--
-- Table structure for table `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mesas`
--

INSERT INTO `mesas` (`id`, `image`, `estado`) VALUES
(4, '4.png', 'Cerrada'),
(5, NULL, 'Disponible'),
(6, '6.jpg', 'Disponible'),
(7, '7.jpg', 'Disponible'),
(8, '.jpg', 'Disponible'),
(9, '9.jpg', 'Disponible'),
(10, NULL, 'Disponible');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `facturaId` int(11) NOT NULL,
  `mesaId` int(11) NOT NULL,
  `mozoUsername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clienteUsername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempoEstimado` int(9) NOT NULL,
  `pedidosBarIds` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pedidosCervezaIds` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pedidosCocinaIds` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `facturaId`, `mesaId`, `mozoUsername`, `clienteUsername`, `estado`, `tiempoEstimado`, `pedidosBarIds`, `pedidosCervezaIds`, `pedidosCocinaIds`, `hora`, `last_updated`) VALUES
(1, 1, 4, 'jperez903', 'jorge', 'Cerrado', 0, '[1]', '[1]', '[1,2]', '2019-07-01 02:01:55', '2019-07-08 17:45:15'),
(2, 2, 4, 'jperez903', 'alberto', 'Nuevo', 0, '[2]', '[]', '[3,4,5]', '2019-07-01 02:15:53', '2019-07-08 17:45:15'),
(3, 3, 4, 'fcanevali900', 'alberto', 'Nuevo', 0, '[3]', '[]', '[6,7,8]', '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(4, 4, 4, 'fcanevali900', 'alberto', 'Cerrado', 23, '[4]', '[]', '[9,10,11]', '2019-07-09 17:35:38', '2019-07-09 17:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos_bar`
--

CREATE TABLE `pedidos_bar` (
  `id` int(11) NOT NULL,
  `pedidoId` int(11) NOT NULL,
  `bartenderUsername` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productoId` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cerrado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pedidos_bar`
--

INSERT INTO `pedidos_bar` (`id`, `pedidoId`, `bartenderUsername`, `estado`, `productoId`, `cantidad`, `cerrado`, `last_updated`) VALUES
(1, 0, NULL, 'Entregado a la mesa', 3, 3, '2019-07-01 02:01:55', '2019-07-08 17:44:14'),
(2, 1, NULL, 'Nuevo', 3, 4, '2019-07-01 02:15:53', '2019-07-08 17:44:14'),
(3, 2, NULL, 'Nuevo', 3, 4, '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(4, 3, NULL, 'Entregado a la mesa', 3, 4, '2019-07-09 17:35:38', '2019-07-09 17:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos_cerveza`
--

CREATE TABLE `pedidos_cerveza` (
  `id` int(11) NOT NULL,
  `pedidoId` int(11) NOT NULL,
  `cerveceroUsername` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productoId` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cerrado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pedidos_cerveza`
--

INSERT INTO `pedidos_cerveza` (`id`, `pedidoId`, `cerveceroUsername`, `estado`, `productoId`, `cantidad`, `cerrado`, `last_updated`) VALUES
(1, 0, NULL, 'Entregado a la mesa', 5, 4, '2019-07-01 02:01:55', '2019-07-08 17:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos_cocina`
--

CREATE TABLE `pedidos_cocina` (
  `id` int(11) NOT NULL,
  `pedidoId` int(11) NOT NULL,
  `cocineroUsername` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productoId` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cerrado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pedidos_cocina`
--

INSERT INTO `pedidos_cocina` (`id`, `pedidoId`, `cocineroUsername`, `estado`, `productoId`, `cantidad`, `cerrado`, `last_updated`) VALUES
(1, 0, NULL, 'Entregado a la mesa', 1, 2, '2019-07-01 02:01:55', '2019-07-08 17:44:53'),
(2, 0, NULL, 'Entregado a la mesa', 7, 5, '2019-07-01 02:01:55', '2019-07-08 17:44:53'),
(3, 1, NULL, 'Nuevo', 2, 4, '2019-07-01 02:15:53', '2019-07-08 17:44:53'),
(4, 1, NULL, 'Sirviendo productos', 1, 5, '2019-07-01 02:15:53', '2019-07-08 17:44:53'),
(5, 1, NULL, 'Nuevo', 7, 2, '2019-07-01 02:15:53', '2019-07-08 17:44:53'),
(6, 2, NULL, 'Nuevo', 2, 4, '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(7, 2, NULL, 'Nuevo', 1, 5, '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(8, 2, NULL, 'Nuevo', 7, 2, '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(9, 3, NULL, 'Entregado a la mesa', 2, 4, '2019-07-09 17:35:38', '2019-07-09 17:35:38'),
(10, 3, NULL, 'Entregado a la mesa', 1, 5, '2019-07-09 17:35:38', '2019-07-09 17:35:38'),
(11, 3, NULL, 'Entregado a la mesa', 7, 2, '2019-07-09 17:35:38', '2019-07-09 17:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnitario` int(11) NOT NULL,
  `tiempoEstimado` int(3) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `producto`, `cantidad`, `precioUnitario`, `tiempoEstimado`) VALUES
(1, 'Cocina', 'Estofado de pollo', 90, 1000, 35),
(2, 'Cocina', 'Tallarines al pesto', 90, 900, 20),
(3, 'Bar', 'Vino tinto de la casa', 90, 800, 0),
(4, 'Bar', 'Medida whisky', 90, 750, 0),
(5, 'Cerveza', 'Cerveza quilmes', 90, 700, 4),
(6, 'Cerveza', 'Cerveza palermo', 90, 650, 4),
(7, 'Postre', 'Porcion torta de ricota', 90, 400, 15),
(8, 'Postre', 'Mousse chocolate', 90, 400, 15);

-- --------------------------------------------------------

--
-- Table structure for table `resenas`
--

CREATE TABLE `resenas` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente` varchar(90) NOT NULL,
  `pMesa` int(1) NOT NULL,
  `pMozo` int(1) NOT NULL,
  `pRestaurante` int(1) NOT NULL,
  `pCocinero` int(1) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resenas`
--

INSERT INTO `resenas` (`id`, `fecha`, `cliente`, `pMesa`, `pMozo`, `pRestaurante`, `pCocinero`, `texto`) VALUES
(1, '2019-07-15 17:56:05', 'alberto', 0, 5, 2, 5, 'muy rica la comida gracias por todo aguante el mozo salde');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `active`) VALUES
(1, 'fcanevali900', '$2y$10$W.TZ5.1snV.XKYrcjw9A3uhsihf6vOAsJSdAdjOkwfq870RTwwUPa', 'socio', 1),
(2, 'jalberto902', '$2y$10$BdGSNUZOAtYq2jRQcqEkTOW9U6XyY0/b0uf5frX1qezaCAn2NcZ1S', 'mozo', 1),
(54, 'jorge', '$2y$10$Q5Ay.0uDl8CAslhKu3/Eh.KDRsztumx20dqZVD9MIsI7byEz9ZOdy', 'cliente', 1),
(55, 'jperez903', '$2y$10$4q8ClW7KQseVyATR9DKDCOHA4VBkfSGT5roEAraI0YRi1x6MAM81y', 'mozo', 1),
(56, 'equito904', '$2y$10$3IRq0wtRNacnooypcBU0G.V2g3TeWywl7uQtp5sfyarUzbrraUtU6', 'bartender', 1),
(57, 'mrizzo905', '$2y$10$xQPcARHAtjcV7adC9mO82.obVF5I7LcFOEJs8SGHlGUedBD5zpegq', 'bartender', 1),
(58, 'psalde906', '$2y$10$s9drx5SCnB66D9dsNxJZMOQNYUvxv1q8l1EanGxGf3/4k1RvPoZP.', 'cocinero', 1),
(59, 'egonzalez907', '$2y$10$.LJLq6ag.2.LloxKcV33XunQSrvBF/C2GiaLhjbHZfrRTLgehHKb.', 'cocinero', 1),
(60, 'aruiz908', '$2y$10$XRAUdY4souYZIwYLYeWw0e8lGJXTNni.FYrHqt4ggplb7iSLCSY0K', 'cervecero', 1),
(61, 'mhacha909', '$2y$10$Fk/iHd6bErP/Fhxm1WGxne33lwJvF5gxC11SJ3Vga5NcyrlAlHOIK', 'cervecero', 1),
(62, 'alberto', '$2y$10$xyRDWlT/jW.6Gwxhc2jYr.TkJWJkspLvEFkJ8.uvQlH5Vy0MJouqO', 'cliente', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_login`
--
ALTER TABLE `audit_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos_bar`
--
ALTER TABLE `pedidos_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos_cerveza`
--
ALTER TABLE `pedidos_cerveza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos_cocina`
--
ALTER TABLE `pedidos_cocina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resenas`
--
ALTER TABLE `resenas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `audit_login`
--
ALTER TABLE `audit_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pedidos_bar`
--
ALTER TABLE `pedidos_bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pedidos_cerveza`
--
ALTER TABLE `pedidos_cerveza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pedidos_cocina`
--
ALTER TABLE `pedidos_cocina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resenas`
--
ALTER TABLE `resenas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
