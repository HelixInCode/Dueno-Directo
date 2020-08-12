-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2020 a las 19:50:12
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(200) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `descripcion`, `precio`) VALUES
(1, 'ventas', 'cualquier cosa', 0),
(3, 'nada', 'mucho mucho ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `masteradmin`
--

CREATE TABLE `masteradmin` (
  `idMaster` int(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `masteradmin`
--

INSERT INTO `masteradmin` (`idMaster`, `email`, `clave`, `Nombre`) VALUES
(2, 'cinthiaesidan_94@hotmail.com', 'maBYdC7TaW1Vk', 'Cinthia'),
(3, 'master@nose.com', 'maBYdC7TaW1Vk', 'Micaela'),
(4, 'celses@gmail.com', 'ma4IMKqN/NHbE', 'Cinthia'),
(5, 'cualquiiera@hotmail.com', 'ma4IMKqN/NHbE', 'Brenda'),
(6, 'perro@hotmail.com', 'ma4IMKqN/NHbE', 'sad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `idpromo` int(50) NOT NULL,
  `promociones` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `admin` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `vencimiento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_publicacion` int(200) NOT NULL,
  `id_usuario` int(200) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `horarios` varchar(200) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `disponibilidad` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `visualizacion` varchar(200) NOT NULL,
  `calificacion` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_empleado`
--

CREATE TABLE `registro_empleado` (
  `id_empleado` int(200) NOT NULL,
  `nombre_empleado` varchar(50) NOT NULL,
  `email_empleado` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `categoria_empleado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Lucas', 'paY3Qv/Wkr1a.', 'Lucas Sidan', '41992418', 'cualquiera@algo.com', '2613243532', 'ventas', ''),
(2, 'Cinthia', 'pa4.HHSXL55NA', 'Cinthia', '37965272', 'cinthiaesidan_94@hotmail.com', '261552556565', 'nose', ''),
(3, 'Micaela', 'pa4.HHSXL55NA', 'Cinthia', '5264646', 'sidan@hma', '255465', 'jvjhvhjvhjv', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `masteradmin`
--
ALTER TABLE `masteradmin`
  ADD PRIMARY KEY (`idMaster`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`idpromo`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_publicacion`);

--
-- Indices de la tabla `registro_empleado`
--
ALTER TABLE `registro_empleado`
  ADD PRIMARY KEY (`id_empleado`);

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
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `masteradmin`
--
ALTER TABLE `masteradmin`
  MODIFY `idMaster` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `idpromo` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_publicacion` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_empleado`
--
ALTER TABLE `registro_empleado`
  MODIFY `id_empleado` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
