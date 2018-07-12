-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2018 at 08:40 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lidosuites`
--

-- --------------------------------------------------------

--
-- Table structure for table `alicuotas`
--

CREATE TABLE `alicuotas` (
  `id_alicuota` int(10) UNSIGNED NOT NULL,
  `alicuota` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `monto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `alicuotas`
--

INSERT INTO `alicuotas` (`id_alicuota`, `alicuota`, `monto`, `created`) VALUES
(2, '3%', '3', '2018-06-26 06:52:09'),
(3, '4%', '4', '2018-06-26 06:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `apartamentos`
--

CREATE TABLE `apartamentos` (
  `id_apartamento` int(10) UNSIGNED NOT NULL,
  `id_alicuota` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `saldo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `apartamentos`
--

INSERT INTO `apartamentos` (`id_apartamento`, `id_alicuota`, `nombre`, `saldo`, `estado`, `created`) VALUES
(3, 2, 'Apartamento Nro 3', '100.00', 0, '2018-06-26 06:53:04'),
(4, 3, 'Apartamento Nro 4', '100.00', 0, '2018-06-26 06:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `auditorias`
--

CREATE TABLE `auditorias` (
  `id_auditoria` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `evento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tabla` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `auditorias`
--

INSERT INTO `auditorias` (`id_auditoria`, `id_usuario`, `evento`, `tabla`, `created`) VALUES
(1, 2, 'Agregar un gasto', 'gastos', '2018-07-10 19:00:21'),
(2, 2, 'Agregar una mensualidad', 'mensualidad', '2018-07-10 19:00:39'),
(3, 2, 'Agregar una cuenta por co', 'cxc', '2018-07-10 19:00:42'),
(4, 2, 'Agregar una cuenta por co', 'cxc', '2018-07-10 19:00:42'),
(5, 2, 'Agregar una cuenta por co', 'cxc', '2018-07-10 19:00:43'),
(6, 2, 'Agregar una cuenta por co', 'cxc', '2018-07-10 19:00:43'),
(7, 2, 'Agregar una cuenta por co', 'cxc', '2018-07-10 19:00:43'),
(8, 5, 'Agregar una novedad', 'novedades', '2018-07-12 13:09:08'),
(9, 2, 'Agregar una novedad', 'novedades', '2018-07-12 14:13:58'),
(10, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 15:03:20'),
(11, 2, 'Eliminar una alicuota', 'alicuotas', '2018-07-12 15:07:00'),
(12, 2, 'Eliminar una alicuota', 'alicuotas', '2018-07-12 15:07:17'),
(13, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 15:07:29'),
(14, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 15:19:29'),
(15, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 15:20:01'),
(16, 2, 'Eliminar una alicuota', 'alicuotas', '2018-07-12 15:25:58'),
(17, 2, 'Eliminar una alicuota', 'alicuotas', '2018-07-12 15:26:26'),
(18, 2, 'Eliminar una alicuota', 'alicuotas', '2018-07-12 15:27:44'),
(19, 2, 'Eliminar un documento', 'documentos', '2018-07-12 15:27:58'),
(20, 2, 'Eliminar un documento', 'documentos', '2018-07-12 15:28:01'),
(21, 2, 'Eliminar un documento', 'documentos', '2018-07-12 15:28:25'),
(22, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 15:31:31'),
(23, 2, 'Eliminar un documento', 'documentos', '2018-07-12 15:34:32'),
(24, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 15:35:01'),
(25, 2, 'Eliminar un documento', 'documentos', '2018-07-12 15:35:12'),
(26, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 15:36:30'),
(27, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 15:41:06'),
(28, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 15:51:29'),
(29, 2, 'Agregar un apartamento', 'apartamentos', '2018-07-12 18:24:02'),
(30, 2, 'Editar un documento', 'documentos', '2018-07-12 18:27:44'),
(31, 2, 'Editar un documento', 'documentos', '2018-07-12 18:28:57'),
(32, 2, 'Editar un documento', 'documentos', '2018-07-12 18:30:35'),
(33, 2, 'Editar un documento', 'documentos', '2018-07-12 18:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `bancos`
--

CREATE TABLE `bancos` (
  `id_banco` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(115) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `bancos`
--

INSERT INTO `bancos` (`id_banco`, `descripcion`, `created`) VALUES
(1, 'Banesco', '2018-06-26 06:53:30'),
(2, 'Mercantil', '2018-06-26 06:53:37'),
(3, 'BBVA Provincial', '2018-06-26 06:53:44'),
(4, 'BOD', '2018-06-26 06:53:49'),
(5, 'Banco de Venezuela', '2018-06-26 06:54:00'),
(6, 'Banco Bicentenario', '2018-06-26 06:54:08'),
(7, 'Banco Exterior', '2018-06-26 06:54:18'),
(8, 'Sofitasa', '2018-06-26 06:54:23'),
(9, '100% Banco', '2018-06-26 06:54:32'),
(10, 'Banco Activo', '2018-06-26 06:54:40'),
(11, 'Banco del Sur', '2018-06-26 06:54:47'),
(12, 'Fondo Comun', '2018-06-26 06:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` int(10) UNSIGNED NOT NULL,
  `id_apartamento` int(10) UNSIGNED NOT NULL,
  `id_propietario` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_fin` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cxc`
--

CREATE TABLE `cxc` (
  `id_cxc` int(10) UNSIGNED NOT NULL,
  `id_apartamento` int(10) UNSIGNED NOT NULL,
  `id_alicuota` int(10) UNSIGNED NOT NULL,
  `id_mensualidad` int(10) UNSIGNED NOT NULL,
  `monto` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `cancelado` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `fecha` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cxc`
--

INSERT INTO `cxc` (`id_cxc`, `id_apartamento`, `id_alicuota`, `id_mensualidad`, `monto`, `cancelado`, `fecha`, `created`) VALUES
(3, 3, 2, 1, '61800000.00', 0, '2018-07-10', '2018-07-10 19:00:43'),
(4, 4, 3, 1, '62400000.00', 0, '2018-07-10', '2018-07-10 19:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `cxc_has_pago`
--

CREATE TABLE `cxc_has_pago` (
  `id_cxc_has_pago` int(10) UNSIGNED NOT NULL,
  `id_cxc` int(10) UNSIGNED NOT NULL,
  `cancelado` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(10) UNSIGNED NOT NULL,
  `id_gasto` int(10) UNSIGNED NOT NULL,
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `id_ut` int(10) UNSIGNED NOT NULL,
  `id_mensualidad` int(10) UNSIGNED NOT NULL,
  `monto` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` tinyint(4) DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_mensualidad`
--

CREATE TABLE `detalle_mensualidad` (
  `id_detalle_mensualidad` int(10) UNSIGNED NOT NULL,
  `id_mensualidad` int(10) UNSIGNED NOT NULL,
  `id_gasto` int(10) UNSIGNED NOT NULL,
  `cantidad` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `detalle_mensualidad`
--

INSERT INTO `detalle_mensualidad` (`id_detalle_mensualidad`, `id_mensualidad`, `id_gasto`, `cantidad`, `fecha`, `created`) VALUES
(1, 1, 1, '10', '2018-07-10', '2018-07-10 19:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE `documentos` (
  `id_documento` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(115) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`id_documento`, `id_usuario`, `fecha`, `ubicacion`, `descripcion`, `created`) VALUES
(1, 2, '2018-07-12', '2017-Scrum-Guide-Spanish-SouthAmerican.pdf', 'Scrum Guia 2017', '2018-07-12 15:51:29'),
(2, 2, '2018-07-12', 'curso.txt', 'curso txt', '2018-07-12 18:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `formas_pagos`
--

CREATE TABLE `formas_pagos` (
  `id_forma_pago` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(115) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `formas_pagos`
--

INSERT INTO `formas_pagos` (`id_forma_pago`, `descripcion`, `created`) VALUES
(1, 'Debito', '2018-06-26 06:57:55'),
(2, 'Deposito', '2018-06-26 06:58:02'),
(3, 'Transferencia', '2018-06-26 06:58:10'),
(4, 'Cheque', '2018-06-26 06:58:17'),
(5, 'Pago movil', '2018-06-26 06:58:24'),
(6, 'Efectivo', '2018-06-26 06:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(10) UNSIGNED NOT NULL,
  `id_ut` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `monto` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` tinyint(4) DEFAULT '0',
  `numeroUts` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `gastos`
--

INSERT INTO `gastos` (`id_gasto`, `id_ut`, `descripcion`, `monto`, `tipo`, `numeroUts`, `created`) VALUES
(1, 1, 'Bolsas', '6000000.00', 2, 5, '2018-07-10 19:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `mensualidad`
--

CREATE TABLE `mensualidad` (
  `id_mensualidad` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `total` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` tinyint(4) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mensualidad`
--

INSERT INTO `mensualidad` (`id_mensualidad`, `descripcion`, `total`, `fecha`, `tipo`, `created`) VALUES
(1, 'Julio', '60000000.00', '2018-07-10', 1, '2018-07-10 19:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int(10) UNSIGNED NOT NULL,
  `nivel` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `nivel`, `descripcion`, `created`) VALUES
(1, 'Administrador del sistema', 'Administrador del sistema', '2018-06-26 06:49:16'),
(2, 'Administrador condiminio', 'Administrador condiminio', '2018-06-26 06:50:19'),
(3, 'Propietario', 'Propietario', '2018-06-26 06:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `novedades`
--

CREATE TABLE `novedades` (
  `id_novedad` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `novedades`
--

INSERT INTO `novedades` (`id_novedad`, `id_usuario`, `descripcion`, `created`) VALUES
(1, 5, 'Nueva novedad', '2018-07-12 13:09:08'),
(2, 2, 'Novedad ok', '2018-07-12 14:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(10) UNSIGNED NOT NULL,
  `id_forma_pago` int(10) UNSIGNED NOT NULL,
  `id_apartamento` int(10) UNSIGNED NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `monto` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `referencia` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `aprobado` tinyint(1) NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `propietarios`
--

CREATE TABLE `propietarios` (
  `id_propietario` int(10) UNSIGNED NOT NULL,
  `cedula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `notas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `propietarios`
--

INSERT INTO `propietarios` (`id_propietario`, `cedula`, `nombres`, `apellidos`, `telefono`, `correo`, `notas`, `created`) VALUES
(1, '8554452', 'Karla', 'Mejias', '4545551', 'karlam@outlook.com', 'Propietario Karla', '2018-06-26 06:56:16'),
(2, '21212221', 'Carlos', 'Gutierrez', '455421221', 'carlosg@gmail.com', 'Propietario Carlos', '2018-06-26 06:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `notas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_nivel` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_nivel`, `nombres`, `apellidos`, `correo`, `contrasena`, `telefono`, `created`) VALUES
(1, 1, 'Luis', 'Rondon', 'leduardo.rondon@gmail.com', '202cb962ac59075b964b07152d234b70', '04121805865', '2018-06-26 07:26:18'),
(2, 2, 'Ronald', 'Rodriguez', 'ronaldr@gmail.com', '202cb962ac59075b964b07152d234b70', '04141881071', '2018-06-26 07:27:14'),
(5, 3, 'Karla', 'Mejias', 'karlam@outlook.com', '202cb962ac59075b964b07152d234b70', '4545551', '2018-06-26 06:56:16'),
(6, 3, 'Carlos', 'Gutierrez', 'carlosg@gmail.com', '202cb962ac59075b964b07152d234b70', '455421221', '2018-06-26 06:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `ut`
--

CREATE TABLE `ut` (
  `id_ut` int(10) UNSIGNED NOT NULL,
  `ut` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `anio` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ut`
--

INSERT INTO `ut` (`id_ut`, `ut`, `anio`, `created`) VALUES
(1, '1200000', 2018, '2018-06-26 07:02:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alicuotas`
--
ALTER TABLE `alicuotas`
  ADD PRIMARY KEY (`id_alicuota`);

--
-- Indexes for table `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD PRIMARY KEY (`id_apartamento`),
  ADD KEY `id_alicuota` (`id_alicuota`);

--
-- Indexes for table `auditorias`
--
ALTER TABLE `auditorias`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id_banco`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `id_apartamento` (`id_apartamento`);

--
-- Indexes for table `cxc`
--
ALTER TABLE `cxc`
  ADD PRIMARY KEY (`id_cxc`),
  ADD KEY `id_apartamento` (`id_apartamento`);

--
-- Indexes for table `cxc_has_pago`
--
ALTER TABLE `cxc_has_pago`
  ADD PRIMARY KEY (`id_cxc_has_pago`),
  ADD KEY `id_cxc` (`id_cxc`);

--
-- Indexes for table `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_gasto` (`id_gasto`);

--
-- Indexes for table `detalle_mensualidad`
--
ALTER TABLE `detalle_mensualidad`
  ADD PRIMARY KEY (`id_detalle_mensualidad`),
  ADD KEY `id_mensualidad` (`id_mensualidad`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indexes for table `formas_pagos`
--
ALTER TABLE `formas_pagos`
  ADD PRIMARY KEY (`id_forma_pago`);

--
-- Indexes for table `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `id_ut` (`id_ut`);

--
-- Indexes for table `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD PRIMARY KEY (`id_mensualidad`);

--
-- Indexes for table `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indexes for table `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`id_novedad`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_apartamento` (`id_apartamento`);

--
-- Indexes for table `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`id_propietario`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Indexes for table `ut`
--
ALTER TABLE `ut`
  ADD PRIMARY KEY (`id_ut`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alicuotas`
--
ALTER TABLE `alicuotas`
  MODIFY `id_alicuota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `apartamentos`
--
ALTER TABLE `apartamentos`
  MODIFY `id_apartamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auditorias`
--
ALTER TABLE `auditorias`
  MODIFY `id_auditoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id_banco` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cxc`
--
ALTER TABLE `cxc`
  MODIFY `id_cxc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cxc_has_pago`
--
ALTER TABLE `cxc_has_pago`
  MODIFY `id_cxc_has_pago` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalle_mensualidad`
--
ALTER TABLE `detalle_mensualidad`
  MODIFY `id_detalle_mensualidad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id_documento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formas_pagos`
--
ALTER TABLE `formas_pagos`
  MODIFY `id_forma_pago` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mensualidad`
--
ALTER TABLE `mensualidad`
  MODIFY `id_mensualidad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id_novedad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id_propietario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ut`
--
ALTER TABLE `ut`
  MODIFY `id_ut` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD CONSTRAINT `apartamentos_ibfk_1` FOREIGN KEY (`id_alicuota`) REFERENCES `alicuotas` (`id_alicuota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auditorias`
--
ALTER TABLE `auditorias`
  ADD CONSTRAINT `auditorias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cxc`
--
ALTER TABLE `cxc`
  ADD CONSTRAINT `cxc_ibfk_1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cxc_has_pago`
--
ALTER TABLE `cxc_has_pago`
  ADD CONSTRAINT `cxc_has_pago_ibfk_1` FOREIGN KEY (`id_cxc`) REFERENCES `cxc` (`id_cxc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_gasto`) REFERENCES `gastos` (`id_gasto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle_mensualidad`
--
ALTER TABLE `detalle_mensualidad`
  ADD CONSTRAINT `detalle_mensualidad_ibfk_1` FOREIGN KEY (`id_mensualidad`) REFERENCES `mensualidad` (`id_mensualidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_ut`) REFERENCES `ut` (`id_ut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `novedades`
--
ALTER TABLE `novedades`
  ADD CONSTRAINT `novedades_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
