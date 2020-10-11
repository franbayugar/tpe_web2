-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2020 a las 21:43:16
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
  `paquete` varchar(60) NOT NULL,
  `aliaspaquete` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `paquete`, `aliaspaquete`) VALUES
(1, 'Vuelos', 'VUELO IDA Y VUELTA'),
(2, 'Hoteles', 'ALOJAMIENTO'),
(3, 'Actividades', 'ACTIVIDAD'),
(4, 'Autos', 'ALQUILER DE AUTOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id` int(11) NOT NULL,
  `destino` varchar(80) NOT NULL,
  `descripcion_breve` varchar(110) NOT NULL,
  `descripcion` varchar(640) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id`, `destino`, `descripcion_breve`, `descripcion`, `precio`, `id_categoria`) VALUES
(17, 'Bariloche', 'Volá a Bariloche con Aerolineas Argentinas | Salida desde Buenos Aires', 'San Carlos de Bariloche es un destino sin dudas para disfrutar del calor como del frío. Ubicada a orillas del Lago Nahuel Huapí, es la puerta de entrada a lagos, montañas y cerros patagónicos. Un viaje a Bariloche permite descubrir los paisajes de la patagonia argentina y enamorarse de sus rincones en caminatas, paseos acuáticos o simplemente en deportes de aventura.', 7528, 1),
(19, 'Mendoza', 'Cordón del Plata | 3 estrellas | Desayuno incluido | Cancelación grauita', 'El Hotel Cordon Del Plata, situado en el centro de Mendoza, a 1 km de la plaza de la Independencia, ofrece habitaciones amplias con conexión Wi-Fi gratuita y servicio de desayuno. Las habitaciones del Cordon Del Plata presentan un suelo de moqueta, además de ropa de cama y cortinas en tonos pastel. También disponen de una zona de trabajo y TV por cable. Todos los días se sirve un desayuno bufé.', 2985, 2),
(20, 'Cataratas Argentinas y Brasileras', 'Paseo Superior, Paseo Inferior y la espectacular Garganta del Diablo', 'Se visitaran los circuitos tradicionales: Paseo Superior, Paseo Inferior y la espectacular Garganta del Diablo. El paseo incluye el Tren Ecológico de la Selva. Se visitaran las Cataratas Brasileñas con su tradicional pasarela de 1.200 metros de extensión donde puede obtener una espectacular vista panorámica de los 275 saltos que componen las Cataratas del Iguazú. ', 4175, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$Om6yFFomydmleMPuRGAT6OBKnjNu874LvJJOjb9GP5oK4hp9kF75e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `destino_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
