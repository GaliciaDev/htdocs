-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2023 a las 02:14:17
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
-- Base de datos: `bd_pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_p` int(3) NOT NULL,
  `nombre_p` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `precio_p` int(3) NOT NULL,
  `descripcion_p` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `imagen_p` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `existencia` int(3) NOT NULL,
  `categoria` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_p`, `nombre_p`, `precio_p`, `descripcion_p`, `imagen_p`, `existencia`, `categoria`) VALUES
(1, 'Lapiz', 3, 'Util para tus escritos escolares', '1.png', 50, 'Pp'),
(2, 'Cuaderno', 25, 'Cuadro chico 100 hojas', '2.png', 30, 'Pp'),
(3, 'Borrador', 2, 'Perfecto para tus errores gramaticales', '3.png', 50, 'Pp'),
(4, 'Pluma', 5, 'Pluma de punta fina', '4.png', 25, 'Pp'),
(5, 'Pegamento ', 15, 'Pegamento blanco escolar', '5.png', 15, 'Pp'),
(6, 'Memoria USB', 90, 'Memoria USB 3.0 16GB', '6.png', 4, 'Pp'),
(7, 'Tijeras', 10, 'Tijeras de oficina', '7.png', 20, 'Pp'),
(8, 'Plumones', 15, 'Plumones finos', '14.png', 40, 'Pp'),
(9, 'Regla', 30, 'Regla', '13.png', 30, 'Pp'),
(10, 'Mapa Mundi', 35, 'Mapa Mundi para colorear', '15.png', 20, 'Pp'),
(12, 'Mochila', 200, 'Mochila de Kemonito', '12.png', 20, 'Pp'),
(13, 'Cuchillo ', 5, 'Practico para tus ensaladas', '16.png', 50, 'Pp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_p`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_p` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
