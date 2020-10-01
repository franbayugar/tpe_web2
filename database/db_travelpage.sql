-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2020 a las 18:03:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_travelpage`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `producto` varchar(60) NOT NULL,
  `aliashome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `producto`, `aliashome`) VALUES
(1, 'Vuelos', 'VUELO IDA Y VUELTA'),
(2, 'Hoteles', 'ALOJAMIENTO'),
(3, 'Actividades', 'ACTIVIDAD'),
(4, 'Autos', 'ALQUILER DE AUTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id` int(11) NOT NULL,
  `destino` varchar(80) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id`, `destino`, `descripcion`, `precio`, `fecha`, `id_categoria`) VALUES
(10, 'Bariloche', '4 días, 3 noches. Traslado y hotel incluido.', 17145, '2020-10-20', 1),
(11, 'Mendoza', '5 días, 4 noches. Traslado y hotel incluido.', 10999, '2020-11-15', 2),
(12, 'dad', 'asd', 123132, '2020-09-30', 1),
(14, 'dede', 'sadasd', 343423, '2222-02-13', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_transporte` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD CONSTRAINT `destinos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
