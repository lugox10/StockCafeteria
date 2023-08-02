-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2023 a las 14:43:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha_creacion`) VALUES
(12, 'Café Americano', 'CAF-001', 150, 250, 'Bebidas calientes', 90, '2023-08-01'),
(13, 'Capuchino', 'CAP-002', 180, 300, 'Bebidas calientes', 80, '2023-08-01'),
(14, 'Galletas de Chocolate', 'GAL-003', 50, 100, 'Snacks', 150, '2023-08-01'),
(15, 'Sándwich de Jamón y Queso', 'SAN-004', 200, 200, 'Comidas', 70, '2023-08-01'),
(16, 'Tarta de Manzana', 'TAR-005', 180, 150, 'Postres', 36, '2023-08-01'),
(17, 'tinto', 'CAF 002', 100, 100, 'BEBIDAS CALIENTES', 97, '2023-08-02'),
(18, 'ABDC', 'CAF 003', 233, 111, 'BEBIDAS CALIENTES', 20, '2023-08-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad_vendida` int(11) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `producto_id`, `cantidad_vendida`, `fecha_venta`) VALUES
(1, 1, 2, '2023-08-01'),
(2, 4, 8, '2023-08-01'),
(3, 5, 3, '2023-08-01'),
(4, 6, 9, '2023-08-01'),
(5, 6, 9, '2023-08-01'),
(6, 6, 9, '2023-08-01'),
(7, 3, 3, '2023-08-01'),
(8, 3, 3, '2023-08-01'),
(9, 4, 3, '2023-08-01'),
(10, 4, 3, '2023-08-01'),
(11, 6, 4, '2023-08-01'),
(12, 6, 4, '2023-08-01'),
(13, 6, 4, '2023-08-01'),
(14, 7, 2, '2023-08-01'),
(15, 7, 2, '2023-08-01'),
(16, 3, 1, '2023-08-01'),
(17, 2, 1, '2023-08-01'),
(18, 3, 3, '2023-08-01'),
(19, 3, 2, '2023-08-01'),
(20, 3, 2, '2023-08-01'),
(21, 3, 2, '2023-08-01'),
(22, 3, 2, '2023-08-01'),
(23, 3, 2, '2023-08-01'),
(24, 3, 2, '2023-08-01'),
(25, 3, 2, '2023-08-01'),
(26, 2, 3, '2023-08-01'),
(27, 1, 5, '2023-08-01'),
(28, 1, 5, '2023-08-01'),
(29, 1, 5, '2023-08-01'),
(30, 1, 5, '2023-08-01'),
(31, 1, 2, '2023-08-01'),
(32, 1, 4, '2023-08-01'),
(33, 1, 4, '2023-08-01'),
(34, 1, 4, '2023-08-01'),
(35, 1, 4, '2023-08-01'),
(36, 1, 4, '2023-08-01'),
(37, 1, 4, '2023-08-01'),
(38, 4, 1, '2023-08-01'),
(39, 4, 1, '2023-08-01'),
(40, 3, 6, '2023-08-01'),
(41, 3, 6, '2023-08-01'),
(42, 5, 8, '2023-08-01'),
(43, 5, 8, '2023-08-01'),
(44, 4, 8, '2023-08-01'),
(45, 4, 8, '2023-08-01'),
(46, 4, 1, '2023-08-01'),
(47, 4, 1, '2023-08-01'),
(48, 1, 1, '2023-08-01'),
(49, 1, 1, '2023-08-01'),
(50, 2, 1, '2023-08-01'),
(51, 2, 1, '2023-08-01'),
(52, 6, 1, '2023-08-01'),
(53, 2, 1, '2023-08-02'),
(54, 12, 2, '2023-08-02'),
(55, 12, 4, '2023-08-02'),
(56, 12, 4, '2023-08-02'),
(57, 17, 3, '2023-08-02'),
(58, 16, 4, '2023-08-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
