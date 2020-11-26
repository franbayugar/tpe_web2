-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2020 a las 22:13:03
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
(1, 'Vuelos', 'VUELO'),
(2, 'Hoteles', 'ALOJAMIENTO'),
(3, 'Actividades', 'ACTIVIDAD'),
(4, 'Autos', 'ALQUILER DE AUTOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(240) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `descripcion`, `puntuacion`, `id_usuario`, `id_destino`) VALUES
(1, 'De los mejores destinos del país, para repetirlo!', 5, 2, 17),
(2, 'Un lugar increible, vale la pena visitarlo todas las veces que se pueda, solo le faltan autos que se manejen solos!! JE', 5, 6, 20),
(8, 'Hermoso lugar, aunque para mí gusto los coordinadores no eran lo suficientemente atentos!', 3, 7, 20),
(9, 'Un hotel de lujo, con todas las comodidades. Mi única queja es algún defecto en el WiFi, el resto espectacular, la ubicación, la el desayuno, todo excelente.', 4, 7, 19),
(11, 'Un Hotel con ciertas comodidades, pero falla en aspectos clave que no me terminaron de convencer', 2, 6, 19);

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
  `imagen` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id`, `destino`, `descripcion_breve`, `descripcion`, `precio`, `imagen`, `id_categoria`) VALUES
(17, 'Bariloche', 'Volá a Bariloche con Aerolineas Argentinas | Salida desde Buenos Aires', 'San Carlos de Bariloche es un destino sin dudas para disfrutar del calor como del frío. Ubicada a orillas del Lago Nahuel Huapí, es la puerta de entrada a lagos, montañas y cerros patagónicos. Un viaje a Bariloche permite descubrir los paisajes de la patagonia argentina y enamorarse de sus rincones en caminatas, paseos acuáticos o simplemente en deportes de aventura.', 7528, 'img/destinations/5fbf2b116cf654.65233721.jpg', 1),
(19, 'Mendoza', 'Cordón del Plata | 3 estrellas | Desayuno incluido | Cancelación grauita', 'El Hotel Cordon Del Plata, situado en el centro de Mendoza, a 1 km de la plaza de la Independencia, ofrece habitaciones amplias con conexión Wi-Fi gratuita y servicio de desayuno. Las habitaciones del Cordon Del Plata presentan un suelo de moqueta, además de ropa de cama y cortinas en tonos pastel. También disponen de una zona de trabajo y TV por cable. Todos los días se sirve un desayuno bufé.', 2985, 'img/destinations/5fbed30222d886.11433661.jpg', 2),
(20, 'Cataratas Argentinas y Brasileras', 'Paseo Superior, Paseo Inferior y la espectacular Garganta del Diablo', 'Se visitaran los circuitos tradicionales: Paseo Superior, Paseo Inferior y la espectacular Garganta del Diablo. El paseo incluye el Tren Ecológico de la Selva. Se visitaran las Cataratas Brasileñas con su tradicional pasarela de 1.200 metros de extensión donde puede obtener una espectacular vista panorámica de los 275 saltos que componen las Cataratas del Iguazú. ', 4175, 'img/destinations/5fbef6d0d3c118.49374092.jpg', 3),
(34, 'Ushuaia', 'Hotel Alto Andino | 3 estrellas | Excelente ubicación', 'El Hotel Alto Andino dispone de habitaciones para no fumadores con WiFi gratis y terraza con vistas panorámicas a la ciudad. La bahía se encuentra a menos de 1 km. Todas las habitaciones cuentan con muebles y accesorios modernos como minibar y TV de pantalla plana con canales por cable. También tienen baño con artículos de aseo gratuitos. En el bar del establecimiento, los huéspedes podrán disfrutar de cócteles tropicales y comidas ligeras. Además, el personal del hotel organiza recorridos por la ciudad y excursiones al aire libre. El establecimiento también cuenta con consigna de equipaje y recepción 24 horas. ', 12464, 'img/destinations/5fc00d93ddd1a3.05769695.png', 2),
(35, 'Córdoba', 'Cobertura con franquicia | Km libre | Impuestos', 'Disponemos de distintos autos para llevarte por Córdoba. Contamos con Chevrolet CELTA 1.4 o similar, Fiat Siena 1.8 o similar, Renault Logan 1.8 o similar, Toyota Corolla 1.8 o similar.\r\nTodos cuentan con cobertura parcial por daño del vehículo, cobertura parcial por robo del vehículo y kilómetraje limitado.', 2235, 'img/destinations/5fc00f1e067e68.75526339.jpg', 4),
(36, 'Salta', 'Volá a Salta con Aerolineas Argentinas | Salida desde Buenos Aires', 'Salta, ciudad amable y acogedora, ubicada al este de la Cordillera de Los Andes y atravesada por el río Arenales, cuenta con un patrimonio histórico y monumental de envergadura, diversos espacios culturas de importancia y gracias a su diversidad geográfica, es escenario ideal para la práctica del turismo de aventura. Su gran variedad de paisajes, reservas naturales, espejos de agua y parques nacionales conforman circuitos ideales para deportes como el trail running, senderismo, parapente, cabalgatas, el downhill y todo tipo de actividades náuticas como el rafting o la pesca deportiva. ', 11140, 'img/destinations/5fc00fe089eb15.24314913.jpg', 1),
(37, 'Glaciar Perito Moreno', 'Pick up por hoteles en El Calafate | Guia en español / ingles.', 'Disfrute de la imponente belleza del Glaciar Perito Moreno, una de las Joyas de la UNESCO. El guía lo pasará a buscar por su hotel por la mañana para una excursión de día completo en el Glaciar Perito Moreno. En el camino hacia el parque, le explicarán la importancia del glaciar y compartirán datos y hechos interesantes sobre el parque y el Perito Moreno.', 3185, 'img/destinations/5fc011089c0964.92473236.jpg', 3),
(38, 'Temaiken', 'Billete de entrada al Bioparque', 'El Bioparque Temaiken se encuentra en Belén de Escobar, una ciudad al noroeste de Tigre y noreste del Pilar. Con casi 86 hectarias, el parque se ha diseñado con hábitats que imitan muchos de ambiente naturales de los animales. El parque está dividido en diferentes zonas - africanos, asiáticos y nativos americanos del Sur.', 1780, 'img/destinations/5fc011dfb242e4.24288664.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `email`, `password`, `permission`) VALUES
(2, 'El Viajero', 'viajero@hotmail.com', '$2y$10$fXhBIWJvbaT15PcFeOzUM.WR4kokxlmmrNB0MrI4YTylBW2RjzlsG', 0),
(4, 'Administrador', 'admin2@gmail.com', '$2y$10$HdDREk4fZ9W70Zxp.ilVfubL5sSh8VS0V6Z.DovGNOuECy.ylE7cm', 1),
(6, 'Elon Musk', 'soyelon@tesla.com', '$2y$10$jx7s2AGE70hqCCKpXTgqdeWzxJTuQCR4Nxx.rdeJ8klov7ArY3PT2', 0),
(7, 'PrefieroADedo', 'dedo@yahoo.com', '$2y$10$5ImeINqJDt6LZsxvk3ka9Otc9EeuntxQ45121GBvhAi/FJlfgSGSG', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_destino` (`id_destino`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `destino_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
