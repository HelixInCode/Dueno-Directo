-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2020 a las 18:27:36
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dueno-directo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(200) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_puclicacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `metros` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `baños` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `habitaciones` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `mascotas` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tiempo_publicacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `usuario`, `clave`, `nombre`, `dni`, `email`, `telefono`, `categoria`, `imagen`) VALUES
(1, 'Lucas', 'paY3Qv/Wkr1a.', 'Lucas Sidan', '41992418', 'cualquiera@algo.com', '2613243532', 'ventas', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
