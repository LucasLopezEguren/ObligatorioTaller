-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-02-2018 a las 21:46:52
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Barrios`
--

CREATE TABLE IF NOT EXISTS `Barrios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `Barrios`
--

INSERT INTO `Barrios` (`id`, `nombre`) VALUES
(1, 'Aguada'),
(2, 'Buceo'),
(3, 'Centro'),
(4, 'La Blanqueada'),
(5, 'Maroñas'),
(6, 'Jacinto Vera'),
(7, 'Parque Batlle'),
(8, 'Pocitos'),
(9, 'Malvín'),
(10, 'Punta Carretas'),
(11, 'Carrasco'),
(12, 'Sayago'),
(13, 'Peñarol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Especies`
--

CREATE TABLE IF NOT EXISTS `Especies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `Especies`
--

INSERT INTO `Especies` (`id`, `nombre`) VALUES
(1, 'Perros'),
(2, 'Gatos'),
(3, 'Conejos'),
(4, 'Aves'),
(5, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Preguntas`
--

CREATE TABLE IF NOT EXISTS `Preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_publicacion` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `respuesta` varchar(255) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pregunta_publicacion_idx` (`id_publicacion`),
  KEY `fk_pregunta_usuario_idx` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Preguntas`
--

INSERT INTO `Preguntas` (`id`, `id_publicacion`, `texto`, `respuesta`, `usuario_id`) VALUES
(1, 3, '¿A que hora se perdió?', 'A las 18:00 aproximadamente', 1),
(2, 3, '¿Ya lo encontraron?', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Publicaciones`
--

CREATE TABLE IF NOT EXISTS `Publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `descripcion` longtext NOT NULL,
  `tipo` char(1) NOT NULL,
  `especie_id` int(11) NOT NULL,
  `raza_id` int(11) DEFAULT NULL,
  `barrio_id` int(11) NOT NULL,
  `abierto` bit(1) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `exitoso` bit(1) DEFAULT NULL,
  `latitud` decimal(10,8) DEFAULT NULL,
  `longitud` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publicacion_usuario_idx` (`usuario_id`),
  KEY `fk_publicacion_especie_idx` (`especie_id`),
  KEY `fk_publicacion_raza_idx` (`raza_id`),
  KEY `fk_publicacion_barrio_idx` (`barrio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Publicaciones`
--

INSERT INTO `Publicaciones` (`id`, `titulo`, `descripcion`, `tipo`, `especie_id`, `raza_id`, `barrio_id`, `abierto`, `usuario_id`, `exitoso`, `latitud`, `longitud`) VALUES
(1, 'Encontrado en Peñarol', 'Fue encontrado este perrito en el barrio Peñarol en las inmediaciones de la cooperativa Mesa 2, está asustado y aulla. Se agradese información para devolverlo a sus dueños. Muchas gracias.', 'E', 1, 7, 13, b'1', 1, NULL, -34.82296900, -56.20121800),
(2, 'Ovejero en la Playa', 'Perro Ovejero aleman joven grande, se encuentra caminando sin rumbo en playa de El Buceo, esta muy muy lastimada su boca, con mucha tristeza y mucho dolor, esta precisando realmente ayuda urgente, segun un vecino dice que hace unos dias esta caminando, se agradece a alguien que lo pueda ayudar ya que se encuentra bien.', 'E', 1, 5, 2, b'0', 1, b'1', -34.90103100, -56.12275500),
(3, 'Thor', 'se perdio en 8 de octubre y garibaldi, color negro tamaño grande es manso se llama thor, se recompensarà, tel 094 XXX XXX', 'P', 1, 6, 4, b'1', 2, NULL, -34.88916200, -56.16065800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Razas`
--

CREATE TABLE IF NOT EXISTS `Razas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `especie_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_raza_especie_idx` (`especie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `Razas`
--

INSERT INTO `Razas` (`id`, `especie_id`, `nombre`) VALUES
(1, 1, 'Cocker'),
(2, 1, 'Labrador'),
(3, 1, 'Bull Dog'),
(4, 1, 'Salchicha'),
(5, 1, 'Ovejero Alemán'),
(6, 1, 'Cruza'),
(7, 1, 'Otros'),
(11, 2, 'Persa'),
(12, 2, 'Siamés'),
(13, 2, 'Sphynx'),
(14, 2, 'Otros'),
(15, 3, 'Doméstico'),
(16, 4, 'Loros'),
(17, 4, 'Papagayos'),
(18, 4, 'Otros'),
(19, 5, 'Tortugas'),
(20, 5, 'Serpientes'),
(21, 5, 'Arañas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `email`, `nombre`, `password`) VALUES
(1, 'juan.perez@test.com', 'Juan Perez', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'agonzalez@otro.com', 'Ana Gonzalez', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Preguntas`
--
ALTER TABLE `Preguntas`
  ADD CONSTRAINT `fk_pregunta_publicacion` FOREIGN KEY (`id_publicacion`) REFERENCES `Publicaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pregunta_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Publicaciones`
--
ALTER TABLE `Publicaciones`
  ADD CONSTRAINT `fk_publicacion_barrio` FOREIGN KEY (`barrio_id`) REFERENCES `Barrios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacion_especie` FOREIGN KEY (`especie_id`) REFERENCES `Especies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacion_raza` FOREIGN KEY (`raza_id`) REFERENCES `Razas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacion_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Razas`
--
ALTER TABLE `Razas`
  ADD CONSTRAINT `fk_raza_especie` FOREIGN KEY (`especie_id`) REFERENCES `Especies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
