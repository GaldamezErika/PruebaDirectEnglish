-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2020 a las 02:13:56
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `directenglish`
--
CREATE DATABASE IF NOT EXISTS `directenglish` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `directenglish`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_consultar` ()  BEGIN
SELECT e.nombre_empleado, e.apellido_empleado, e.direccion_empleado, e.telefono_empleado, em.nombre_empresa, e.id_empleado
FROM empleado e
INNER JOIN empresa em ON em.id_empresa = e.id_empresa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_consultar_emp` ()  BEGIN
SELECT * FROM empresa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar` (IN `id_empl` INT)  BEGIN
DELETE FROM empleado
WHERE id_empleado = id_empl;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar` (IN `nombre` VARCHAR(35), IN `apellido` VARCHAR(35), IN `direccion` VARCHAR(200), IN `telefono` VARCHAR(9), IN `id_emp` INT)  BEGIN
INSERT INTO empleado(nombre_empleado,apellido_empleado,direccion_empleado,telefono_empleado,id_empresa)
VALUES(nombre,apellido,direccion,telefono,id_emp);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_empr` (IN `nombre` VARCHAR(35), IN `direccion` VARCHAR(200), IN `telefono` VARCHAR(9))  BEGIN
INSERT INTO empresa(nombre_empresa,direccion_empresa,telefono_empresa)
VALUES(nombre,direccion,telefono);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar` (IN `nombre` VARCHAR(35), IN `apellido` VARCHAR(35), IN `direccion` VARCHAR(200), IN `telefono` VARCHAR(9), IN `id_emp` INT, IN `id_emple` INT)  BEGIN
UPDATE empleado SET
nombre_empleado = nombre,
apellido_empleado = apellido,
direccion_empleado = direccion,
telefono_empleado = telefono,
id_empresa = id_emp
WHERE id_empleado = id_emple;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_empr` (IN `nombre` VARCHAR(35), IN `direccion` VARCHAR(200), IN `telefono` VARCHAR(9), IN `id_empr` INT)  BEGIN
UPDATE empresa SET
nombre_empresa = nombre,
direccion_empresa = direccion,
telefono_empresa = telefono
WHERE id_empresa = id_empr;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombre_empleado` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_empleado` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_empleado` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_empleado` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombre_empleado`, `apellido_empleado`, `direccion_empleado`, `telefono_empleado`, `id_empresa`) VALUES
(1, 'Erika', 'Galdamez', 'San Salvador', '2234-6578', 1),
(8, 'Carlos', 'Gamez', 'Soyapango', '7689-3456', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_empresa` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_empresa` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre_empresa`, `direccion_empresa`, `telefono_empresa`) VALUES
(1, 'Direct English', 'Centro comercial metrocentro', '2214-6780'),
(2, 'Call English', 'Colonia escalon', '2765-6798'),
(6, 'open english', 'new york', '4567-4569');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
