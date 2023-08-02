-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 06:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(100) COLLATE utf8_bin NOT NULL,
  `referencia` varchar(50) COLLATE utf8_bin NOT NULL,
  `precio` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_bin NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha_creacion`) VALUES
(1, 'Laptop Lenovo', 'LEN123', 800, 2000, 'Electrónicos', 48, '2023-08-01'),
(2, 'Smartphone Samsung', 'SAMS456', 600, 180, 'Electrónicos', 100, '2023-08-02'),
(3, 'Camiseta Nike', 'NIK789', 30, 250, 'Ropa', 194, '2023-08-03'),
(4, 'Zapatos Adidas', 'ADID123', 80, 500, 'Calzado', 66, '2023-08-04'),
(5, 'Gafas de Sol Ray-Ban', 'RAYB789', 120, 100, 'Accesorios', 27, '2023-08-05'),
(6, 'Libro \"The Lord of the Rings\"', 'LOTR001', 25, 700, 'Libros', 11, '2023-08-06'),
(7, 'PlayStation 5', 'PS5123', 500, 4000, 'Videojuegos', 20, '2023-08-07'),
(8, 'Computador', 'www', 2, 3, 'ddd', 3, '2023-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad_vendida` int(11) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ventas`
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
(13, 6, 4, '2023-08-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
