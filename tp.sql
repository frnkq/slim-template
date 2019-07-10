-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2019 at 10:40 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_php`
--

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
  `fechaApertura` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechaCierre` timestamp NOT NULL DEFAULT current_timestamp(),
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
(4, 'FC407D17-77AB-4FFD-A804-98DEF828919A', 'fcanevali900', 'alberto', '2019-07-09 17:35:38', '2019-07-09 17:35:38', '[[2,4],[1,5],[7,2],[3,4]]', '-1');

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
(4, '4.png', 'Cliente esperando pedido'),
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
  `hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `facturaId`, `mesaId`, `mozoUsername`, `clienteUsername`, `estado`, `tiempoEstimado`, `pedidosBarIds`, `pedidosCervezaIds`, `pedidosCocinaIds`, `hora`, `last_updated`) VALUES
(1, 1, 4, 'jperez903', 'jorge', 'Entregado a la mesa', 0, '[1]', '[1]', '[1,2]', '2019-07-01 02:01:55', '2019-07-08 17:45:15'),
(2, 2, 4, 'jperez903', 'alberto', 'Nuevo', 0, '[2]', '[]', '[3,4,5]', '2019-07-01 02:15:53', '2019-07-08 17:45:15'),
(3, 3, 4, 'fcanevali900', 'alberto', 'Nuevo', 0, '[3]', '[]', '[6,7,8]', '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(4, 4, 4, 'fcanevali900', 'alberto', 'En preparacion', 23, '[4]', '[]', '[9,10,11]', '2019-07-09 17:35:38', '2019-07-09 17:35:38');

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
  `cerrado` timestamp NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pedidos_bar`
--

INSERT INTO `pedidos_bar` (`id`, `pedidoId`, `bartenderUsername`, `estado`, `productoId`, `cantidad`, `cerrado`, `last_updated`) VALUES
(1, 0, NULL, 'Entregado a la mesa', 3, 3, '2019-07-01 02:01:55', '2019-07-08 17:44:14'),
(2, 1, NULL, 'Nuevo', 3, 4, '2019-07-01 02:15:53', '2019-07-08 17:44:14'),
(3, 2, NULL, 'Nuevo', 3, 4, '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(4, 3, NULL, 'En preparacion', 3, 4, '2019-07-09 17:35:38', '2019-07-09 17:35:38');

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
  `cerrado` timestamp NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
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
  `cerrado` timestamp NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pedidos_cocina`
--

INSERT INTO `pedidos_cocina` (`id`, `pedidoId`, `cocineroUsername`, `estado`, `productoId`, `cantidad`, `cerrado`, `last_updated`) VALUES
(1, 0, NULL, 'Entregado a la mesa', 1, 2, '2019-07-01 02:01:55', '2019-07-08 17:44:53'),
(2, 0, NULL, 'Entregado a la mesa', 7, 5, '2019-07-01 02:01:55', '2019-07-08 17:44:53'),
(3, 1, NULL, 'Nuevo', 2, 4, '2019-07-01 02:15:53', '2019-07-08 17:44:53'),
(4, 1, NULL, 'Nuevo', 1, 5, '2019-07-01 02:15:53', '2019-07-08 17:44:53'),
(5, 1, NULL, 'Nuevo', 7, 2, '2019-07-01 02:15:53', '2019-07-08 17:44:53'),
(6, 2, NULL, 'Nuevo', 2, 4, '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(7, 2, NULL, 'Nuevo', 1, 5, '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(8, 2, NULL, 'Nuevo', 7, 2, '2019-07-09 17:33:02', '2019-07-09 17:33:02'),
(9, 3, NULL, 'En preparacion', 2, 4, '2019-07-09 17:35:38', '2019-07-09 17:35:38'),
(10, 3, NULL, 'Nuevo', 1, 5, '2019-07-09 17:35:38', '2019-07-09 17:35:38'),
(11, 3, NULL, 'Nuevo', 7, 2, '2019-07-09 17:35:38', '2019-07-09 17:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `producto`, `cantidad`, `precioUnitario`) VALUES
(1, 'Cocina', 'Estofado de pollo', 90, 1000),
(2, 'Cocina', 'Tallarines al pesto', 90, 900),
(3, 'Bar', 'Vino tinto de la casa', 90, 800),
(4, 'Bar', 'Medida whisky', 90, 750),
(5, 'Cerveza', 'Cerveza quilmes', 90, 700),
(6, 'Cerveza', 'Cerveza palermo', 90, 650),
(7, 'Postre', 'Porcion torta de ricota', 90, 400),
(8, 'Postre', 'Mousse chocolate', 90, 400);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'fcanevali900', '$2y$10$W.TZ5.1snV.XKYrcjw9A3uhsihf6vOAsJSdAdjOkwfq870RTwwUPa', 'socio'),
(2, 'jalberto902', '$2y$10$BdGSNUZOAtYq2jRQcqEkTOW9U6XyY0/b0uf5frX1qezaCAn2NcZ1S', 'mozo'),
(54, 'jorge', '$2y$10$Q5Ay.0uDl8CAslhKu3/Eh.KDRsztumx20dqZVD9MIsI7byEz9ZOdy', 'cliente'),
(55, 'jperez903', '$2y$10$4q8ClW7KQseVyATR9DKDCOHA4VBkfSGT5roEAraI0YRi1x6MAM81y', 'mozo'),
(56, 'equito904', '$2y$10$3IRq0wtRNacnooypcBU0G.V2g3TeWywl7uQtp5sfyarUzbrraUtU6', 'bartender'),
(57, 'mrizzo905', '$2y$10$xQPcARHAtjcV7adC9mO82.obVF5I7LcFOEJs8SGHlGUedBD5zpegq', 'bartender'),
(58, 'psalde906', '$2y$10$s9drx5SCnB66D9dsNxJZMOQNYUvxv1q8l1EanGxGf3/4k1RvPoZP.', 'cocinero'),
(59, 'egonzalez907', '$2y$10$.LJLq6ag.2.LloxKcV33XunQSrvBF/C2GiaLhjbHZfrRTLgehHKb.', 'cocinero'),
(60, 'aruiz908', '$2y$10$XRAUdY4souYZIwYLYeWw0e8lGJXTNni.FYrHqt4ggplb7iSLCSY0K', 'cervecero'),
(61, 'mhacha909', '$2y$10$Fk/iHd6bErP/Fhxm1WGxne33lwJvF5gxC11SJ3Vga5NcyrlAlHOIK', 'cervecero'),
(62, 'alberto', '$2y$10$xyRDWlT/jW.6Gwxhc2jYr.TkJWJkspLvEFkJ8.uvQlH5Vy0MJouqO', 'cliente');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
