-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2017 a las 00:51:37
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

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
(108, 'KKP 232', 'Audi', 'Negro', 1497560512),
(116, 'JHF 546', 'Chevrolet', 'Marron', 1497560573),
(206, 'AA 321 BE', 'Ford', 'Blanco', 1497560625),
(304, 'LTA 898', 'Chery', 'Gris', 1498689687),
(306, 'TE 505 OE', 'Chrysler', 'Azul', 1497560672),
(308, 'AA 226 TZ', 'Gelyx', 'Bordo', 1498861108);

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
(1, 102, 0, 1),
(1, 103, 0, 1),
(1, 104, 0, 0),
(1, 105, 0, 0),
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
(1, 116, 1, 0),
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
(2, 204, 0, 0),
(2, 205, 0, 0),
(2, 206, 1, 0),
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
(3, 304, 1, 0),
(3, 305, 0, 0),
(3, 306, 1, 0),
(3, 307, 0, 0),
(3, 308, 1, 0),
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
(112, 2, 'AAA 123', 1495664854, 1495666190, 3.7),
(305, 3, 'KKE 223', 1495578361, 1497380069, 5004.7),
(307, 3, 'AAB 221', 1497380094, 1497380351, 0.7),
(204, 3, 'KKK 000', 1495666018, 1497381688, 4765.7),
(108, 3, 'AA 332 PP', 1495569308, 1497381761, 5034.6),
(101, 3, 'KKK 222', 1497381844, 1497381855, 0),
(105, 3, 'PPR 321', 1495660316, 1497383523, 4786.6),
(107, 3, 'KEP 982', 1497383744, 1497383897, 0.3),
(108, 3, 'KKN 232', 1497383464, 1497383989, 1.4),
(307, 5, 'AAE 210', 1497380380, 1497392505, 33.6),
(109, 5, 'TRT 220', 1497383825, 1497560833, 491.2),
(110, 4, 'EPE 222', 1497392537, 1497560853, 467.5),
(104, 2, 'oki 202', 1497392487, 1497560886, 467.8),
(107, 3, 'PEP 606', 1497560538, 1498855358, 3596.6),
(307, 3, 'POP 212', 1498689276, 1498855383, 391.4),
(111, 6, 'LOP 204', 1497383782, 1498859458, 4099.1),
(101, 3, '123123qsd', 1498860274, 1498860289, 0),
(205, 3, 'ew 111 ee', 1498860948, 1498861074, 0.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_usuarios`
--

CREATE TABLE `registro_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `logout` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_usuarios`
--

INSERT INTO `registro_usuarios` (`id`, `id_usuario`, `login`, `logout`) VALUES
(1, 1, '20-5-2017  0:32', '20-5-2017  0:32'),
(2, 2, '22-5-2017  22:22', '22-5-2017  22:28'),
(3, 3, '22-5-2017  22:28', '22-5-2017  22:38'),
(4, 2, '22-5-2017  22:39', '22-5-2017  23:3'),
(5, 3, '23-5-2017  21:47', '23-5-2017  22:12'),
(6, 3, '23-5-2017  22:12', '24-5-2017  0:19'),
(7, 2, '24-5-2017  22:5', '24-5-2017  22:12'),
(8, 3, '24-5-2017  23:4', '25-5-2017  0:29'),
(9, 3, '25-5-2017  0:32', '25-5-2017  0:49'),
(10, 3, '26-5-2017  22:7', '26-5-2017  23:0'),
(11, 3, '6-6-2017  22:57', '6-6-2017  22:58'),
(12, 3, '8-6-2017  23:19', '8-6-2017  23:19'),
(13, 3, '8-6-2017  23:24', '8-6-2017  23:25'),
(14, 3, '8-6-2017  23:25', '8-6-2017  23:26'),
(15, 3, '8-6-2017  23:27', '8-6-2017  23:27'),
(16, 2, '8-6-2017  23:27', '8-6-2017  23:37'),
(17, 3, '8-6-2017  23:37', '8-6-2017  23:39'),
(18, 3, '13-6-2017  20:53', '13-6-2017  20:56'),
(19, 3, '13-6-2017  20:59', '13-6-2017  21:16'),
(20, 3, '13-6-2017  21:17', '13-6-2017  21:19'),
(21, 3, '13-6-2017  21:19', '13-6-2017  21:21'),
(22, 3, '13-6-2017  22:51', '13-6-2017  22:52'),
(23, 3, '13-6-2017  22:55', '14-6-2017  0:12'),
(24, 3, '15-6-2017  22:15', '15-6-2017  23:1'),
(25, 4, '15-6-2017  23:1', '15-6-2017  23:3'),
(26, 5, '15-6-2017  23:3', '15-6-2017  23:7'),
(27, 4, '15-6-2017  23:7', '15-6-2017  23:7'),
(28, 3, '26-6-2017  22:8', '26-6-2017  22:8'),
(29, 3, '26-6-2017  22:8', '26-6-2017  22:8'),
(30, 3, '26-6-2017  22:8', '26-6-2017  22:41'),
(31, 3, '26-6-2017  22:41', '27-6-2017  0:6'),
(32, 5, '27-6-2017  0:6', '27-6-2017  0:9'),
(33, 2, '27-6-2017  0:9', '27-6-2017  0:9'),
(34, 3, '27-6-2017  0:9', '27-6-2017  0:10'),
(35, 3, '28-6-2017  16:31', '28-6-2017  16:33'),
(36, 3, '29-6-2017  0:33', '29-6-2017  0:41'),
(37, 5, '29-6-2017  0:41', '29-6-2017  0:56'),
(38, 3, '30-6-2017  0:12', '30-6-2017  0:15'),
(39, 2, '30-6-2017  0:16', '30-6-2017  0:16'),
(40, 3, '30-6-2017  0:16', '30-6-2017  0:20'),
(41, 3, '30-6-2017  0:22', '30-6-2017  0:22'),
(42, 5, '30-6-2017  0:23', '30-6-2017  0:23'),
(43, 3, '30-6-2017  0:23', '30-6-2017  0:23'),
(44, 6, '30-6-2017  0:23', '30-6-2017  0:24'),
(45, 3, '30-6-2017  22:33', '30-6-2017  22:34'),
(46, 2, '30-6-2017  22:34', '30-6-2017  22:36'),
(47, 3, '30-6-2017  22:42', '30-6-2017  23:50'),
(48, 6, '30-6-2017  23:50', '30-6-2017  23:51'),
(49, 3, '1-7-2017  21:26', '1-7-2017  21:29'),
(50, 3, '1-7-2017  21:26', '1-7-2017  21:29'),
(51, 3, '1-7-2017  21:31', '2-7-2017  0:19'),
(52, 2, '2-7-2017  0:19', '2-7-2017  0:21');

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
  `turno` varchar(20) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `fondo` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `password`, `nombre`, `apellido`, `tipo`, `turno`, `habilitado`, `fondo`, `foto`) VALUES
(2, 'xxx', 'Pedro', 'Gutierrez', 'user', 'noche', 1, '', ''),
(3, 'asd', 'Gui', 'Fink', 'admin', 'noche', 1, 'header-bg.jpg', ''),
(4, 'asd', 'Juan', 'Perez', 'user', 'noche', 1, '', ''),
(5, 'asd', 'Martin', 'Lopez', 'user', 'tarde', 0, '', ''),
(6, 'asd', 'Ramon', 'Alvarez', 'user', 'manana', 1, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_lugar`);

--
-- Indices de la tabla `registro_usuarios`
--
ALTER TABLE `registro_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_usuarios`
--
ALTER TABLE `registro_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
