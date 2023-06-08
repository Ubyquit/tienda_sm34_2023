-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 26-05-2023 a las 17:49:40
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_sm34`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_eliminarFabricante` (IN `fabricante_id` INT)   BEGIN
DELETE FROM fabricante WHERE id_fabricante = fabricante_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_verFabricantes` ()   BEGIN
SELECT COUNT(id_producto) AS contador , fabricante.nombre AS nombre, id_fabricante
FROM producto RIGHT JOIN fabricante
ON producto.id_fabricante_id = fabricante.id_fabricante
GROUP BY id_fabricante;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_verProductos` ()   BEGIN
SELECT id_producto,
producto.nombre,
precio,
fabricante.nombre AS fabricante
FROM producto INNER JOIN fabricante
ON producto.id_fabricante_id = fabricante.id_fabricante;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE `fabricante` (
  `id_fabricante` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`id_fabricante`, `nombre`) VALUES
(1, 'Asus'),
(2, 'Lenovo'),
(3, 'Hewlett-Packard'),
(4, 'Samsung'),
(6, 'Crucial'),
(7, 'Gigabyte'),
(13, 'Apple');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `id_fabricante_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `id_fabricante_id`) VALUES
(1, 'Disco duro  32TB', 862, 3),
(3, 'Disco SSD 1 TB', 150.99, 4),
(4, 'GeForce GTX 1050Ti', 185, 7),
(7, 'Monitor 27 LED Full HD', 245, 1),
(9, 'Portátil Ideapd 320', 444, 1),
(10, 'Impresora HP Deskjet 3720', 59.99, 3),
(13, 'Pikachu', 100000, 3),
(14, 'Pikachu', 120000, 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id_fabricante`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_fabricante_id` (`id_fabricante_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id_fabricante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_fabricante_id`) REFERENCES `fabricante` (`id_fabricante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
