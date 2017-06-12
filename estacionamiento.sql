-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2017 a las 23:15:42
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacionamiento`
--
CREATE DATABASE IF NOT EXISTS `estacionamiento` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `estacionamiento`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id_lugar` int(11) NOT NULL,
  `patente` varchar(9) NOT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `hora` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_lugar`, `patente`, `marca`, `color`, `hora`) VALUES
(105, 'PPR 321', 'Audi', 'Blanco', 1495660316),
(108, 'AA 332 PP', 'Chevrolet', 'Azul', 1495569308),
(204, 'KKK 000', 'Ford', 'Rojo', 1495666018),
(305, 'KKE 223', 'Dodge', 'Azul', 1495578361);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id_piso` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  `ocupado` tinyint(1) NOT NULL,
  `discapacitado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id_piso`, `id_lugar`, `ocupado`, `discapacitado`) VALUES
(1, 101, 0, 1),
(1, 102, 1, 1),
(1, 103, 0, 1),
(1, 104, 0, 0),
(1, 105, 1, 0),
(1, 106, 0, 0),
(1, 107, 0, 0),
(1, 108, 1, 0),
(1, 109, 0, 0),
(1, 110, 0, 0),
(1, 111, 0, 0),
(1, 112, 0, 0),
(1, 113, 0, 0),
(1, 114, 0, 0),
(1, 115, 0, 0),
(1, 116, 0, 0),
(1, 117, 0, 0),
(1, 118, 0, 0),
(1, 119, 0, 0),
(1, 120, 0, 0),
(1, 121, 0, 0),
(1, 122, 0, 0),
(1, 123, 0, 0),
(1, 124, 0, 0),
(1, 125, 0, 0),
(1, 126, 0, 0),
(1, 127, 0, 0),
(1, 128, 0, 0),
(1, 129, 0, 0),
(1, 130, 0, 0),
(2, 201, 0, 1),
(2, 202, 0, 1),
(2, 203, 0, 1),
(2, 204, 1, 0),
(2, 205, 0, 0),
(2, 206, 0, 0),
(2, 207, 0, 0),
(2, 208, 0, 0),
(2, 209, 0, 0),
(2, 210, 0, 0),
(2, 211, 0, 0),
(2, 212, 0, 0),
(2, 213, 0, 0),
(2, 214, 0, 0),
(2, 215, 0, 0),
(2, 216, 0, 0),
(2, 217, 0, 0),
(2, 218, 0, 0),
(2, 219, 0, 0),
(2, 220, 0, 0),
(2, 221, 0, 0),
(2, 222, 0, 0),
(2, 223, 0, 0),
(2, 224, 0, 0),
(2, 225, 0, 0),
(2, 226, 0, 0),
(2, 227, 0, 0),
(2, 228, 0, 0),
(2, 229, 0, 0),
(2, 230, 0, 0),
(3, 301, 0, 1),
(3, 302, 0, 1),
(3, 303, 0, 1),
(3, 304, 0, 0),
(3, 305, 1, 0),
(3, 306, 0, 0),
(3, 307, 0, 0),
(3, 308, 0, 0),
(3, 309, 0, 0),
(3, 310, 0, 0),
(3, 311, 0, 0),
(3, 312, 0, 0),
(3, 313, 0, 0),
(3, 314, 0, 0),
(3, 315, 0, 0),
(3, 316, 0, 0),
(3, 317, 0, 0),
(3, 318, 0, 0),
(3, 319, 0, 0),
(3, 320, 0, 0),
(3, 321, 0, 0),
(3, 322, 0, 0),
(3, 323, 0, 0),
(3, 324, 0, 0),
(3, 325, 0, 0),
(3, 326, 0, 0),
(3, 327, 0, 0),
(3, 328, 0, 0),
(3, 329, 0, 0),
(3, 330, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_lugar` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `patente` varchar(11) NOT NULL,
  `hora_inicio` bigint(20) NOT NULL,
  `hora_fin` bigint(20) NOT NULL,
  `monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id_lugar`, `id_usuario`, `patente`, `hora_inicio`, `hora_fin`, `monto`) VALUES
(109, 3, 'KKK 222', 1495569602, 1495660326, 252),
(110, 3, 'ppp222', 1495569484, 1495665393, 266.4),
(112, 2, 'AAA 123', 1495664854, 1495666190, 3.7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_usuarios`
--

CREATE TABLE `registro_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `logout` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_usuarios`
--

INSERT INTO `registro_usuarios` (`id_usuario`, `login`, `logout`) VALUES
(1, '0000-00-00', '0000-00-00'),
(1, '0000-00-00', '0000-00-00'),
(1, '0000-00-00', '0000-00-00'),
(1, '0000-00-00', '0000-00-00'),
(1, '20-5-2017  0:32', '20-5-2017  0:32'),
(2, '22-5-2017  22:22', '22-5-2017  22:28'),
(3, '22-5-2017  22:28', '22-5-2017  22:38'),
(2, '22-5-2017  22:39', '22-5-2017  23:3'),
(3, '23-5-2017  21:47', '23-5-2017  22:12'),
(3, '23-5-2017  22:12', '24-5-2017  0:19'),
(2, '24-5-2017  22:5', '24-5-2017  22:12'),
(3, '24-5-2017  23:4', '25-5-2017  0:29'),
(3, '25-5-2017  0:32', '25-5-2017  0:49'),
(3, '26-5-2017  22:7', '26-5-2017  23:0'),
(3, '6-6-2017  22:57', '6-6-2017  22:58'),
(3, '8-6-2017  23:19', '8-6-2017  23:19'),
(3, '8-6-2017  23:24', '8-6-2017  23:25'),
(3, '8-6-2017  23:25', '8-6-2017  23:26'),
(3, '8-6-2017  23:27', '8-6-2017  23:27'),
(2, '8-6-2017  23:27', '8-6-2017  23:37'),
(3, '8-6-2017  23:37', '8-6-2017  23:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `turno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `password`, `nombre`, `apellido`, `tipo`, `turno`) VALUES
(2, 'xxx', 'pedro', 'gutierrez', 'user', 'noche'),
(3, 'asd', 'gui', 'fink', 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_lugar`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
