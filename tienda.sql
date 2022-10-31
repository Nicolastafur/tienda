-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2022 a las 22:13:38
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_c` int(12) NOT NULL,
  `nombre_cliente` varchar(40) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` bigint(11) NOT NULL,
  `direccion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_c`, `nombre_cliente`, `apellido`, `telefono`, `direccion`) VALUES
(1, 'Jose', 'Capera', 123, 'asda'),
(2, 'abraham', 'giraldo', 12334, 'qwqwe'),
(3, 'miguel', 'perdomo', 324, 'sdfsf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `detalle` int(12) NOT NULL,
  `id_factura` int(12) DEFAULT NULL,
  `codigo` int(12) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_comple` int(10) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`detalle`, `id_factura`, `codigo`, `cantidad`, `precio_comple`, `id_usu`) VALUES
(1, 1, 1, 5, 10000, 0),
(2, 1, 2, 5, 37500, 0),
(4, 2, 1, 5, 10000, 0),
(5, 2, 2, 5, 37500, 0),
(7, 3, 1, 10, 20000, 0),
(8, 4, 2, 10, 75000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_est` int(11) NOT NULL,
  `nombre_est` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_est`, `nombre_est`) VALUES
(1, 'Facturado'),
(2, 'Anulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(12) NOT NULL,
  `id_c` int(12) DEFAULT NULL,
  `fecha` date DEFAULT current_timestamp(),
  `id_usu` int(12) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `id_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_c`, `fecha`, `id_usu`, `total`, `id_est`) VALUES
(1, 2, '2022-06-23', 123, 47500, 2),
(2, 1, '2022-06-23', 123, 47500, 2),
(3, 1, '2022-06-23', 123, 20000, 2),
(4, 2, '2022-06-23', 123, 75000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nombre_pro` varchar(20) NOT NULL,
  `precio` int(12) NOT NULL,
  `existencia` int(11) NOT NULL,
  `fecha` date DEFAULT current_timestamp(),
  `nit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `id`, `nombre_pro`, `precio`, `existencia`, `fecha`, `nit`) VALUES
(1, 12, 'papas', 2000, 15, '2022-06-10', 23),
(2, 32, 'coca', 7500, 115, '2022-06-10', 24),
(6, 0, 'asdasd', 123, 213, '2022-07-16', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `nit` int(20) NOT NULL,
  `id` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `telefono` bigint(12) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`nit`, `id`, `nombre`, `telefono`, `direccion`) VALUES
(23, 1, 'supertienda rosita', 32, 'qwedxC'),
(24, 2, 'Postobon', 34, 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(12) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Auditor'),
(4, 'Bodega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `detalle` int(12) NOT NULL,
  `id_factura` int(10) DEFAULT NULL,
  `codigo` int(12) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_comple` int(10) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temporal`
--

INSERT INTO `temporal` (`detalle`, `id_factura`, `codigo`, `cantidad`, `precio_comple`, `id_usu`) VALUES
(1, NULL, 2, 1, 7500, 0),
(2, NULL, 2, 1, 7500, 0),
(3, NULL, 2, 1, 7500, 0),
(4, NULL, 2, 1, 7500, 0),
(5, NULL, 2, 1, 7500, 0),
(6, NULL, 2, 1, 7500, 0),
(7, NULL, 1, 1, 2000, 123),
(8, NULL, 2, 1, 7500, 123),
(9, NULL, 2, 5, 37500, 123),
(10, NULL, 2, 5, 37500, 123),
(11, NULL, 2, 5, 37500, 123),
(12, NULL, 2, 5, 37500, 123),
(13, NULL, 2, 5, 37500, 123),
(14, NULL, 2, 5, 37500, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(12) NOT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `clave` varchar(250) DEFAULT NULL,
  `id_rol` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre_usuario`, `correo`, `usuario`, `clave`, `id_rol`) VALUES
(1, 'gomez', 'gomez@gmail.com', 'gomez1', '$2y$12$Zxt.F4Y.UAxIALXjFjJ7Nud5yKRJ0PdEO6XsaWKpLOjXPiG3UaMrm', 2),
(2, 'Abraham', 'asda@msdasd.com', 'Giraldo', '$2y$10$tM6bNuW1R7Eqd5ex7P/FS.ryFxwXjgyehUCXsemuilhN1wEPiUlFa', 3),
(123, 'nicolas', 'nicolas@gmail.com', 'nico1', '$2y$10$ggCfoHcmcRv9IjyembE/YubQ7Yjm50u8F/9PIys4muikADCsYnZ4y', 1),
(300, 'Miguel', 'ac@gmail.com', 'Miguel123', '$2y$10$kyoWvDhK04y/zPW0Mvlgz.QEIxtM1T22hjH4eLjLPYbNxmMkGM1eC', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_c`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`detalle`),
  ADD KEY `producto_ibk_1` (`codigo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_est`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_est` (`id_est`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id_p` (`nit`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`nit`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`detalle`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `detalle` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `detalle` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `producto_ibk_1` FOREIGN KEY (`codigo`) REFERENCES `productos` (`codigo`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_est`) REFERENCES `estado` (`id_est`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
