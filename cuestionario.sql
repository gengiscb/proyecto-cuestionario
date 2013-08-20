-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2013 a las 21:38:26
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cuestionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE IF NOT EXISTS `calificaciones` (
  `idAlumno` int(11) NOT NULL,
  `Aciertos` int(11) NOT NULL,
  PRIMARY KEY (`idAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`idAlumno`, `Aciertos`) VALUES
(1, 0),
(2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unidad` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(15) NOT NULL,
  `pregunta` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imagen` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `materia`, `unidad`, `descripcion`, `estado`, `pregunta`, `imagen`) VALUES
(1, 'Matemáticas ', '1', 'Don Jorge es paletero. Para hacer una entrega organiza 10 paletas en una bolsa, cuando tiene 10 bolsas las acomoda en una caja.', 'activa', 'Si le encargaron 734 paletas. ¿Cuántas bolsas empaquetó?', ''),
(2, 'Matemáticas ', '1', 'Don Jorge es paletero. Para hacer una entrega organiza 10 paletas en una bolsa, cuando tiene 10 bolsas las acomoda en una caja.', 'activa', 'Si entregó 3 cajas y 9 paletas. ¿Cuántas paletas se entregó en total?', ''),
(3, 'Matemáticas ', '1', 'Don Jorge es paletero. Para hacer una entrega organiza 10 paletas en una bolsa, cuando tiene 10 bolsas las acomoda en una caja.', 'activa', '¿Cuántas paletas en total lleva una caja?', ''),
(4, 'Matemáticas ', '1', 'Don Jorge es paletero. Para hacer una entrega organiza 10 paletas en una bolsa, cuando tiene 10 bolsas las acomoda en una caja.', 'activa', 'Si entregó 10 cajas. ¿Cuántas paletas se entregó en total?', ''),
(5, 'Matemáticas ', '1', 'Don Beto tiene un taller en donde coloca llantas a motocicletas, triciclos y coches.', 'activa', 'A Don Beto le trajerón 4 triciclos. ¿Cuántas llantas utilizará en total?', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE IF NOT EXISTS `respuestas` (
  `idPregunta` int(11) NOT NULL,
  `respuesta1` varchar(30) NOT NULL,
  `respuesta2` varchar(30) NOT NULL,
  `respuesta3` varchar(30) NOT NULL,
  `respuestaCorrecta` varchar(30) NOT NULL,
  PRIMARY KEY (`idPregunta`),
  KEY `idPregunta` (`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idPregunta`, `respuesta1`, `respuesta2`, `respuesta3`, `respuestaCorrecta`) VALUES
(1, '63', '74', '34', '73'),
(2, '39', '390', '93', '309'),
(3, '1', '10', '1000', '100'),
(4, '1 centena', '1 decena', '1 unidad', '1 millar'),
(5, '15', '10', '9', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadosalumno`
--

CREATE TABLE IF NOT EXISTS `resultadosalumno` (
  `idAlumno` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuestaAlumno` varchar(30) NOT NULL,
  PRIMARY KEY (`idAlumno`,`idPregunta`),
  KEY `idPregunta` (`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarioId`, `nombre`, `apellido`, `tipoUsuario`) VALUES
(1, 'alum', 'alum', 2),
(2, 'profe', 'profe', 1),
(3, 'gengis', 'cetina', 2),
(4, 'ricardo', 'chacon', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultadosalumno`
--
ALTER TABLE `resultadosalumno`
  ADD CONSTRAINT `resultadosalumno_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `usuarios` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resultadosalumno_ibfk_2` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
