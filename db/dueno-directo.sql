-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2020 a las 21:29:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

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
(3, 'master@nose.com', 'maBYdC7TaW1Vk', 'Micaela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `idProf` int(200) NOT NULL,
  `profesional` varchar(50) NOT NULL,
  `titulacion` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `localidad` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `idPropiedad` int(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo_propiedad` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `dolar` varchar(50) NOT NULL,
  `finalidad` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `area_total` varchar(50) NOT NULL,
  `area_cubierta` varchar(50) NOT NULL,
  `gas` varchar(10) NOT NULL,
  `luz` varchar(10) NOT NULL,
  `agua` varchar(10) NOT NULL,
  `cloacas` varchar(10) NOT NULL,
  `habitaciones` varchar(10) NOT NULL,
  `banos` varchar(10) NOT NULL,
  `mascotas` varchar(10) NOT NULL,
  `cochera` varchar(10) NOT NULL,
  `expensas` varchar(10) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `municipalidad` varchar(100) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `antig` varchar(50) NOT NULL,
  `uso` varchar(50) NOT NULL,
  `tiempo_publicacion` varchar(100) NOT NULL,
  `imagen1` varchar(200) NOT NULL,
  `imagen2` varchar(200) NOT NULL,
  `imagen3` varchar(200) NOT NULL,
  `imagen4` varchar(200) NOT NULL,
  `imagen5` varchar(200) NOT NULL,
  `idUser` int(200) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`idPropiedad`, `nombre`, `tipo_propiedad`, `peso`, `dolar`, `finalidad`, `descripcion`, `area_total`, `area_cubierta`, `gas`, `luz`, `agua`, `cloacas`, `habitaciones`, `banos`, `mascotas`, `cochera`, `expensas`, `provincia`, `municipalidad`, `calle`, `numero`, `telefono`, `antig`, `uso`, `tiempo_publicacion`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `idUser`, `estado`) VALUES
(9, 'Casa Familiar', 'casa', '50000000', '500000', 'venta', 'abasjbsj kjsksn aubd kjha ajkhaskbjkb asiksb s skjab am kajbakj sm sdhkb sdm sdkljnd', '150', '100', 'si', 'si', 'si', 'si', '3', '2', 'si', 'si', 'no', 'Mendoza', 'Godoy Cruz', 'Las Acasias', '', '222451545', '', '', '1', '1.png', '2.png', 'ecommerce.png', 'plan1.jpg', 'nikita-kachanovsky-bLY5JqP_Ldw-unsplash.jpg', 0, ''),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', 'fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', 'fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', 'fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', 'chris-ried-ieic5Tq8YMk-unsplash.jpg', 0, ''),
(11, 'Casa dorada', 'casa', '', '', 'venta', 'jhahas jaahaj a aklanlkas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '260051dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '260051fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '260051fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '260051gradienta--gmycsIe7FU-unsplash.jpg', '260051igor-miske-Px3iBXV-4TU-unsplash.jpg', 0, ''),
(12, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '32260055dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '32260055fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '32260055fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '32260055gradienta--gmycsIe7FU-unsplash.jpg', '32260055dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', 0, ''),
(13, 'Casa de Campo', 'casa', '2555555', '22254', 'venta', 'Texto de P¨rueba para simular una dewscripcionsk ', '150', '100', 'si', 'si', 'si', 'si', '3', '1', 'si', 'si', 'no', 'Corrientes', 'No se', 'calle algo', '', '5585555', '', '', '1', '80260155ash-edmonds-Koxa-GX_5zs-unsplash.jpg', '80260155carl-heyerdahl-KE0nC8-58MQ-unsplash.jpg', '80260155chris-ried-ieic5Tq8YMk-unsplash.jpg', '80260155anas-alshanti-feXpdV001o4-unsplash.jpg', '80260155kevin-ku-w7ZyuGYNpRQ-unsplash.jpg', 2, ''),
(14, 'Casa de Campo', 'casa', '5255525', '2251245', 'venta', 'kdjbjks askhsmnasjkgañaskdn', '150', '', '', '', '', '', '2', '1', 'si', 'si', 'no', 'La Pampa', 'jhsjs', 'gshshsh', '', '545454', '', '', '1', '70260210dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '70260210fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '70260210fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '70260210fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '70260210anas-alshanti-feXpdV001o4-unsplash.jpg', 2, ''),
(15, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '73260218dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '73260218fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '73260218carl-heyerdahl-KE0nC8-58MQ-unsplash.jpg', '73260218carl-heyerdahl-KE0nC8-58MQ-unsplash.jpg', '73260218fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', 2, ''),
(16, 'Casa dorada', 'casa', '5254125', '24445', 'venta', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '97260223dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '97260223fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '97260223fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '97260223dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '97260223kevin-ku-w7ZyuGYNpRQ-unsplash.jpg', 2, ''),
(17, 'Hola', 'casa', '4775', '4557', 'alquiler', 'jhasgahabamagasasgsak', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '96260225dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '96260225fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '96260225fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '96260225carl-heyerdahl-KE0nC8-58MQ-unsplash.jpg', '96260225chris-ried-ieic5Tq8YMk-unsplash.jpg', 2, ''),
(18, 'Casaaaaa', 'casa', '2245455', '112121', 'venta', 'hab aka, akabnkaba', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '41260231fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '41260231dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '41260231fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '41260231clark-tibbs-oqStl2L5oxI-unsplash.jpg', '41260231anas-alshanti-feXpdV001o4-unsplash.jpg', 2, ''),
(19, 'casaaaaa', 'casa', '', '', 'alquiler', 'jabaibakjgakjgas', '', '', 'si', 'si', 'si', 'si', '', '', 'si', 'no', 'no', 'Mendoza', '', '', '', '', '', '', '', '96260233dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '96260233fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '96260233fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '96260233clark-tibbs-oqStl2L5oxI-unsplash.jpg', '96260233ash-edmonds-Koxa-GX_5zs-unsplash.jpg', 2, ''),
(20, 'casaaa', 'lote', '', '', 'venta', 'aiugskjbak  aiosugba yhi adoighoizdy hai{hod', '', '', 'si', 'si', 'si', 'si', '2', '2', 'si', 'si', 'no', 'Mendoza', 'Las Heras', '', '', '', '', '', '', '45260235fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '45260235dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '45260235fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '45260235fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '45260235ash-edmonds-Koxa-GX_5zs-unsplash.jpg', 2, ''),
(21, 'casaaaa', 'casa', '', '', 'venta', 'jhvv jhcbvjh', '', '', 'si', 'si', 'si', 'si', '2', '1', 'si', 'no', 'no', '', '', '', '', '', '', '', '', '99260236fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '99260236fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '99260236carl-heyerdahl-KE0nC8-58MQ-unsplash.jpg', '99260236anas-alshanti-feXpdV001o4-unsplash.jpg', '99260236anas-alshanti-feXpdV001o4-unsplash.jpg', 2, ''),
(22, 'casaaaa', 'casa', '455', '66', 'alquiler', 'hfvjvkv', '', '', 'si', 'si', 'si', 'si', '', '', 'no', 'no', 'no', '', '', '', '', '', '', '', '', '22260238fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '22260238fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '22260238dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '22260238clark-tibbs-oqStl2L5oxI-unsplash.jpg', '22260238carl-heyerdahl-KE0nC8-58MQ-unsplash.jpg', 2, ''),
(23, 'BBBB', 'departamento', '', '', 'alquiler', 'jhvsjv skjshbjs', '', '', 'si', 'si', 'si', 'si', '1', '1', 'si', 'no', 'no', '', '', '', '', '', '', '', '', '24260241fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', '24260241fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '24260241dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '24260241clark-tibbs-oqStl2L5oxI-unsplash.jpg', '24260241chris-ried-ieic5Tq8YMk-unsplash.jpg', 2, ''),
(24, 'CCCSD', 'casa', '', '', 'alquiler', 'jkgsjkbasjksvbjkvsd', '', '', 'si', 'si', 'si', 'si', '2', '1', 'si', 'si', 'si', 'Corrientes', 'nbjkasb', '', '', '', '', '', '', '12260246chris-ried-ieic5Tq8YMk-unsplash.jpg', '12260246fabian-grohs-XMFZqrGyV-Q-unsplash.jpg', '12260246dmitry-chernyshov-mP7aPSUm7aE-unsplash.jpg', '12260246clark-tibbs-oqStl2L5oxI-unsplash.jpg', '12260246anas-alshanti-feXpdV001o4-unsplash.jpg', 2, ''),
(25, 'Casa Familiar', 'casa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '882615322.png', '882615321.png', '88261532ecommerce.png', '88261532carl-heyerdahl-KE0nC8-58MQ-unsplash.jpg', '88261532fatos-bytyqi-Agx5_TLsIf4-unsplash.jpg', 2, ''),
(26, 'Casa Amarilla', 'casa', '', '', 'alquiler', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '172615361.png', '172615362.png', '172615363.png', '172615364.png', '17261536andras-vas-Bd7gNnWJBkU-unsplash.jpg', 2, ''),
(27, 'Casa Inglesa', 'casa', '50880000', '200000', 'venta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Facilisis sed odio morbi quis. Tincidunt ornare massa eget egestas ', '150', '100', 'si', 'si', 'si', 'si', '3', '2', 'si', 'si', 'no', 'Mendoza', 'Godoy Cruz', 'Acasias', '', '2613018098', 'Menos de 1 año', 'A estrenar', '1', '56262118corinne-kutz-tMI2_-r5Nfo-unsplash.jpg', '56262118carlos-muza-hpjSkU2UYSU-unsplash.jpg', '56262118christopher-gower-m_HRfLhgABo-unsplash.jpg', '56262118daniel-apodaca-Qzs-8tgI2dk-unsplash.jpg', '56262118domenico-loia-hGV2TfOh0ns-unsplash.jpg', 2, ''),
(28, 'Casa Bonita', 'casa', '522021565', '2020021', 'venta', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dol', '150', '100', 'si', 'si', 'si', 'si', '4 o mas', '2', 'si', 'si', 'no', 'Mendoza', 'Ciudad', 'Alberdi', '', '32465421654', 'Menos de 1 año', 'A estrenar', '1', '66262131carlos-muza-hpjSkU2UYSU-unsplash.jpg', '66262131brooke-cagle-WHWYBmtn3_0-unsplash.jpg', '66262131coffee-2425303_1920.jpg', '66262131domenico-loia-hGV2TfOh0ns-unsplash.jpg', '66262131corinne-kutz-tMI2_-r5Nfo-unsplash.jpg', 2, ''),
(29, 'Casa de Campo', 'casa', '5021154121', '20021', 'venta', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dol', '150', '100', 'si', 'si', 'si', 'si', '3', '2', 'si', 'si', 'no', 'Catamarca', 'Las Heras', 'independencia', '', '2165151651', 'Menos de 1 año', 'A estrenar', '1', '90262152domenico-loia-hGV2TfOh0ns-unsplash.jpg', '90262152carlos-muza-hpjSkU2UYSU-unsplash.jpg', '90262152christopher-gower-m_HRfLhgABo-unsplash.jpg', '90262152corinne-kutz-tMI2_-r5Nfo-unsplash.jpg', '90262152christopher-gower-m_HRfLhgABo-unsplash.jpg', 2, 'precargada');

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
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `usuario`, `clave`, `nombre`, `dni`, `email`, `telefono`, `categoria`, `descripcion`, `imagen`) VALUES
(1, 'Lucas', 'paY3Qv/Wkr1a.', 'Lucas Sidan', '41992418', 'cualquiera@algo.com', '2613243532', 'ventas', '', ''),
(2, 'La Mejor', 'pa4.HHSXL55NA', 'Cinthia', '37965272', 'cinthiaesidan_94@hotmail.com', '261552556565', 'propietario', '', ''),
(3, 'Helix', 'pa4.HHSXL55NA', 'Cinthia Sidan', '37965272', 'sidan@hotmail.com', '255465', 'propietario', 'Descripcion de prueba', ''),
(4, 'Orlando', 'paa5KD6arxLr2', 'Orlando Salinas', '40221354', 'orlando@nose.com', '251655652165', 'sfdfdfdff', '', '');

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
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`idProf`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`idPropiedad`);

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
  MODIFY `id_categoria` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `masteradmin`
--
ALTER TABLE `masteradmin`
  MODIFY `idMaster` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `idProf` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `idPropiedad` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
