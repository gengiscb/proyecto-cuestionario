-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2013 a las 13:22:59
-- Versión del servidor: 5.6.11
-- Versión de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cuestionario`
--
CREATE DATABASE IF NOT EXISTS `cuestionario` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cuestionario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE IF NOT EXISTS `calificaciones` (
  `idAlumno` int(11) NOT NULL,
  `Aciertos` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `imagen` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
(2, 'profe', 'profe', 1);

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
