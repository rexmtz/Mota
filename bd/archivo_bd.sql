-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2018 a las 18:10:16
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `archivo_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `id_archivo` int(5) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `contenido` varchar(150) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `descargas` int(5) NOT NULL,
  `id_usuario` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id_archivo`, `nombre`, `contenido`, `ubicacion`, `descargas`, `id_usuario`) VALUES
(1, 'archivo1.txt', '', 'C:/xampp/htdocs/Mota/P1/archivos/raulmtz/', 1, 1),
(2, 'Prueba archivo.txt', '', 'C:/xampp/htdocs/Mota/P1/archivos/rex/', 1, 2),
(3, 'archivo1.txt', '', 'C:/xampp/htdocs/Mota/P1/archivos/rex/', 0, 2),
(4, '6 de febrero.txt', '', 'C:/xampp/htdocs/Mota/P1/archivos/raulmtz/', 1, 1),
(5, 'contenido.txt', '0', 'C:/xampp/htdocs/Mota/P1/archivos/raulmtz/', 1, 1),
(7, 'contenido2.txt', 'Este archivo tiene testo :3', 'C:/xampp/htdocs/Mota/P1/archivos/raulmtz/', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(3) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nickname`, `pass`, `email`) VALUES
(1, 'raulmtz', '123456', 'rulmtz.c@gmail.com'),
(2, 'rex', 'rex', 'rex@itm.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id_archivo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
