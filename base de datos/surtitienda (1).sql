-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2022 a las 05:48:04
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
-- Base de datos: `surtitienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` char(70) DEFAULT NULL,
  `apellido` char(70) DEFAULT NULL,
  `tel` bigint(10) DEFAULT NULL,
  `direccion` char(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `tel`, `direccion`) VALUES
(34, 'Aileen', 'Parra', 3146792123, 'Mz A casa 15 B/ Las palmeras'),
(123, 'Santiago', 'Leal', 3248908763, 'calle 12 numero 21-10'),
(134, 'Carlos', 'Gonzalez', 3212113108, 'mz 5 casa 2 B/ las Américas'),
(143, 'Luis', 'Osorio', 3247253453, 'mz 23 casa 43 B/ los tunjos'),
(45678, 'Andres', 'Leal', 2321323434, 'mhgsdgd@jagd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factu`
--

CREATE TABLE `detalle_factu` (
  `id_detal` int(11) NOT NULL,
  `n_factu` int(11) DEFAULT NULL,
  `cod_product` int(11) NOT NULL,
  `cantidad` int(12) DEFAULT NULL,
  `valor_venta` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_factu`
--

INSERT INTO `detalle_factu` (`id_detal`, `n_factu`, `cod_product`, `cantidad`, `valor_venta`) VALUES
(171, 85, 3, 3, 2400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tempo`
--

CREATE TABLE `detalle_tempo` (
  `id_detal` int(11) NOT NULL,
  `n_factu` int(11) DEFAULT NULL,
  `cod_product` int(11) DEFAULT NULL,
  `cantidad` int(12) DEFAULT NULL,
  `valor_venta` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_esta` int(4) NOT NULL,
  `estado` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_esta`, `estado`) VALUES
(1, 'Anulado'),
(2, 'Facturado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `n_factu` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp(),
  `id_usu` int(11) NOT NULL,
  `valor_total` int(9) DEFAULT NULL,
  `id_esta` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`n_factu`, `id_cliente`, `fecha_creacion`, `id_usu`, `valor_total`, `id_esta`) VALUES
(85, 134, '2022-06-20', 123, 7200, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_product` int(11) NOT NULL,
  `nit` int(11) DEFAULT NULL,
  `nombre_p` char(70) DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `cantidadp` int(8) DEFAULT NULL,
  `fecha_ingres` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_product`, `nit`, `nombre_p`, `precio`, `cantidadp`, `fecha_ingres`) VALUES
(1, 1, 'Leche colanta', 2000, 51, '2022-06-05'),
(2, 2, 'Pepsi', 1500, 50, '2022-06-06'),
(3, 3, 'Avena Alpina', 2400, 44, '2022-06-12'),
(4, 4, 'Coca Cola', 2300, 14, '2022-06-20'),
(5, 3, 'Yogurt Alpina', 1500, 46, '2022-06-19'),
(6, 3, 'Alpinito', 2500, 40, '2022-06-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `nit` int(11) NOT NULL,
  `nombre` char(70) DEFAULT NULL,
  `telefono` bigint(10) DEFAULT NULL,
  `direccion` char(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`nit`, `nombre`, `telefono`, `direccion`) VALUES
(1, 'Colanta', 32231, 'calle 12 numero 24-17'),
(2, 'Pepsi', 3229576101, 'mz 5 casa 12 B/ las Américas'),
(3, 'Alpina', 3232499386, 'calle 11 numero 3-27'),
(4, 'Coca Cola', 3445544, 'mz 20 casa 13 B/ Palmeras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usu`
--

CREATE TABLE `tipo_usu` (
  `id_tip_usu` int(3) NOT NULL,
  `tip_usu` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usu`
--

INSERT INTO `tipo_usu` (`id_tip_usu`, `tip_usu`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Auditor'),
(4, 'Bodega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `id_tip_usu` int(3) DEFAULT NULL,
  `usuario` char(60) DEFAULT NULL,
  `nombre_usuario` char(70) DEFAULT NULL,
  `apellido_usuario` char(70) DEFAULT NULL,
  `correo` char(80) DEFAULT NULL,
  `clave` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `id_tip_usu`, `usuario`, `nombre_usuario`, `apellido_usuario`, `correo`, `clave`) VALUES
(123, 2, 'maycol12', 'Maycol', 'Sanchez', 'myacol23@gmail.com', '$2y$10$l40684jYkdZeIonh3Hr.Xesef3R5fhCplJ7JbRmGyXb3UAFg0RajW'),
(456, 3, 'aya123', 'Gabriel', 'Cardozo', 'cardozo123@gmail.com', '$2y$10$P9Xm80G6J2icJ1QcbqtkKOkDSx.0se.TZmVyoxoAdcNMiyMlcMUw.'),
(789, 4, 'hl11', 'Luis Alfredo', 'Hernandez Ramirez', 'Hernandez11@gmail.com', '$2y$10$lFFPDB8Rqs2C74JQArZpFO.5ASvsHzZqMfBAozS65nCASXwwCRFCC'),
(1409, 1, 'Admin1', 'Andrea Camila', 'Remires Vazquez', 'mjain@shhd', '$2y$10$XBJUfsoS38LOGQTfG7slzun9N9a/44ejIBlKF.JzfjNvw25Rhl.z2'),
(1005772553, 1, 'nico12', 'Nicolas Andres', 'Gomez Leal', 'nico2@gmail.com', '$2y$10$4V6CgjVbVcTFc1/eHJKwbeoML2NHhO7FI0kUmlSBrmKgmmOapD1gi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_factu`
--
ALTER TABLE `detalle_factu`
  ADD PRIMARY KEY (`id_detal`),
  ADD KEY `cod_product` (`cod_product`),
  ADD KEY `n_factu` (`n_factu`);

--
-- Indices de la tabla `detalle_tempo`
--
ALTER TABLE `detalle_tempo`
  ADD PRIMARY KEY (`id_detal`),
  ADD KEY `n_factu` (`n_factu`),
  ADD KEY `cod_product` (`cod_product`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_esta`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`n_factu`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_esta` (`id_esta`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_product`),
  ADD KEY `nit` (`nit`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`nit`);

--
-- Indices de la tabla `tipo_usu`
--
ALTER TABLE `tipo_usu`
  ADD PRIMARY KEY (`id_tip_usu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `id_tip_usu` (`id_tip_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_factu`
--
ALTER TABLE `detalle_factu`
  MODIFY `id_detal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `detalle_tempo`
--
ALTER TABLE `detalle_tempo`
  MODIFY `id_detal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `n_factu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `nit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factu`
--
ALTER TABLE `detalle_factu`
  ADD CONSTRAINT `detalle_factu_ibfk_2` FOREIGN KEY (`cod_product`) REFERENCES `productos` (`cod_product`),
  ADD CONSTRAINT `factu` FOREIGN KEY (`n_factu`) REFERENCES `facturas` (`n_factu`);

--
-- Filtros para la tabla `detalle_tempo`
--
ALTER TABLE `detalle_tempo`
  ADD CONSTRAINT `detalle_tempo_ibfk_1` FOREIGN KEY (`n_factu`) REFERENCES `facturas` (`n_factu`),
  ADD CONSTRAINT `detalle_tempo_ibfk_2` FOREIGN KEY (`cod_product`) REFERENCES `productos` (`cod_product`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`id_esta`) REFERENCES `estados` (`id_esta`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`nit`) REFERENCES `proveedor` (`nit`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tip_usu`) REFERENCES `tipo_usu` (`id_tip_usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
