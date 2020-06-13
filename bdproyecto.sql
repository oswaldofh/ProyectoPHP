-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2020 a las 17:17:41
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
-- Base de datos: `bdproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `codCliente` varchar(50) NOT NULL,
  `nomCliente` varchar(100) NOT NULL,
  `tipoCliente` varchar(20) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `fechaInactivo` date DEFAULT NULL,
  `imgenCliente` varchar(100) DEFAULT NULL,
  `emailCliente` varchar(100) NOT NULL,
  `telefonoCliente` varchar(50) NOT NULL,
  `creditoCliente` double NOT NULL,
  `estadoCliente` tinyint(1) NOT NULL,
  `latCliente` varchar(100) NOT NULL,
  `lonCliente` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codCliente`, `nomCliente`, `tipoCliente`, `fechaRegistro`, `fechaInactivo`, `imgenCliente`, `emailCliente`, `telefonoCliente`, `creditoCliente`, `estadoCliente`, `latCliente`, `lonCliente`) VALUES
('1313', 'arroz diana sa', '1', '2020-05-14', '0000-00-00', '../Imagen/Clientes/', 'diana@gmail.com', '123456', 120000, 1, '6.09106', ''),
('123', 'juan sanchez', '', '2020-05-13', '0000-00-00', '../Imagen/Clientes/', 'juan@gmail.com', '312345', 20000, 1, '6.0910602', '-75.5579529');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `codEmpleado` varchar(50) NOT NULL,
  `nomEmpleado` varchar(100) NOT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `fechaRetiro` date DEFAULT NULL,
  `salarioBasico` double NOT NULL,
  `deduciones` double NOT NULL,
  `fotoEmpleado` varchar(100) DEFAULT NULL,
  `hojaVida` varchar(100) DEFAULT NULL,
  `emailEmpleado` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `estadoEmpleado` tinyint(1) DEFAULT NULL,
  `latEmpleado` varchar(100) NOT NULL,
  `lonEmpleado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`codEmpleado`, `nomEmpleado`, `fechaIngreso`, `fechaRetiro`, `salarioBasico`, `deduciones`, `fotoEmpleado`, `hojaVida`, `emailEmpleado`, `telefono`, `celular`, `estadoEmpleado`, `latEmpleado`, `lonEmpleado`) VALUES
('123', 'ferney federico', '0000-00-00', '0000-00-00', 800000, 40000, '../Imagen/Empleados/', '../Document/Empleado/', 'ferney@hotmail.com', '28979879', '320887998766', 1, '', ''),
('1212', 'luisa montoya', '2020-03-07', '0000-00-00', 900000, 40000, '../Imagen/Empleados/', '../Document/Empleado/', 'lmontoya@gmail.com', '101112', '32077655', 1, '', ''),
('1133', 'evelio jose', '2020-03-01', '0000-00-00', 950000, 45000, '', '', 'evelio@gmail.com', '675675', '343980', 1, '', ''),
('1', 'juan', '2019-02-01', '0000-00-00', 1050000, 40000, '', '', 'juan@gmail.com', '8978687', '394765', 1, '', ''),
('2', 'martina galvis', '2020-01-01', '0000-00-00', 1200000, 80000, '', '', 'martina@gmail.com', '89678', '31098756', 1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `fecha` date NOT NULL,
  `leido` tinyint(1) NOT NULL,
  `campo` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `nuevoDato` varchar(200) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `usuario`, `tipo`, `fecha`, `leido`, `campo`, `nuevoDato`) VALUES
(1, '1313', 'clientes', '2020-05-17', 0, 'nomCliente', 'arroz diana sa'),
(2, '1313', 'clientes', '2020-05-17', 0, 'fechaRegistro', '2020-05-14'),
(3, '1313', 'clientes', '2020-05-17', 0, 'fechaRegistro', '2020-05-14'),
(4, '1313', 'clientes', '2020-05-17', 0, 'emailCliente', 'diana@gmail.com'),
(5, '1313', 'clientes', '2020-05-17', 1, 'telefonoCliente', '123456'),
(6, '1313', 'clientes', '2020-05-17', 1, 'tipoCliente', '1'),
(7, '1313', 'clientes', '2020-05-17', 1, 'emailCliente', 'diana@gmail.com'),
(8, '1313', 'clientes', '2020-05-17', 1, 'tipoCliente', '0'),
(9, '1414', 'proveedores', '2020-05-25', 1, 'tipoProveedor', '1'),
(10, '1414', 'proveedores', '2020-05-25', 1, 'telefonoProveedor', '2019-01-01'),
(11, '1414', 'proveedores', '2020-05-25', 1, 'telefonoProveedor', '2019-01-01'),
(12, 'luisa montoya', 'empleados', '2020-05-25', 1, 'telefono', '665577'),
(13, 'luisa montoya', 'empleados', '2020-05-25', 1, 'telefono', '556677'),
(14, 'luisa montoya', 'empleados', '2020-05-25', 1, 'celular', '9087544'),
(15, 'luisa montoya', 'empleados', '2020-05-25', 1, 'telefono', '131414'),
(16, '1212', 'empleados', '2020-05-25', 1, 'telefono', '8899'),
(17, '1212', 'empleados', '2020-05-26', 1, 'telefono', '101112'),
(18, '1313', 'clientes', '2020-05-29', 1, 'lonCliente', '6.24972223'),
(19, '1313', 'clientes', '2020-05-31', 1, 'latCliente', '6.0910602'),
(20, '1313', 'clientes', '2020-05-31', 1, 'lonCliente', '-75.6356888'),
(21, '1212', 'empleados', '2020-06-03', 0, 'latEmpleado', '6.0910602'),
(22, '1212', 'empleados', '2020-06-03', 0, 'lonEmpleado', '-75.6356888');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoproveedor`
--

CREATE TABLE `productoproveedor` (
  `codProPru` int(11) NOT NULL,
  `CodProducto` varchar(50) NOT NULL,
  `codProveedor` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productoproveedor`
--

INSERT INTO `productoproveedor` (`codProPru`, `CodProducto`, `codProveedor`) VALUES
(1, '1', '1414'),
(2, '2', '1414'),
(3, '3', '1414'),
(4, '2', '1515'),
(5, '3', '1515');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codProducto` int(11) NOT NULL,
  `nomProducto` varchar(100) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codProducto`, `nomProducto`, `imagen`) VALUES
(1, 'arroz diana', '../Imagen/Producto/arroz.jpg'),
(2, 'kumis', '../Imagen/Producto/kumis.png'),
(3, 'kumis', '../Imagen/Producto/kumis.png'),
(4, 'moto cafe', ''),
(5, 'atun', '../Imagen/Producto/atun.jpg'),
(6, 'vino ', '../Imagen/Producto/vino.jpg'),
(7, 'vino 22', 'cualquier cosa'),
(8, 'vino 3', 'cualquier cosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `codProveedor` varchar(50) NOT NULL,
  `nomProveedor` varchar(100) NOT NULL,
  `tipoProveedor` varchar(50) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `fechaInactivo` date NOT NULL,
  `imagenProveedor` varchar(100) NOT NULL,
  `emailProveedor` varchar(100) NOT NULL,
  `telefonoProveedor` varchar(50) NOT NULL,
  `estadoProveedor` tinyint(1) NOT NULL,
  `latProveedor` varchar(100) NOT NULL,
  `lonProveedor` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`codProveedor`, `nomProveedor`, `tipoProveedor`, `fechaRegistro`, `fechaInactivo`, `imagenProveedor`, `emailProveedor`, `telefonoProveedor`, `estadoProveedor`, `latProveedor`, `lonProveedor`) VALUES
('1414', 'alpina', '1', '2019-01-01', '0000-00-00', '../Imagen/Proveedores/', 'alpina@gmail.com', '2019-01-01', 1, '6.3373199', '-75.5579529'),
('1515', 'colanta', '0', '2020-05-01', '0000-00-00', '../Imagen/Proveedores/', 'colanta@gmail.com', '87979', 1, '6.3463302', '-75.5088806');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomUsuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `tipoAcceso` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomUsuario`, `contrasena`, `tipoAcceso`) VALUES
(1, 'admin', 'admin', 'administrador'),
(2, '1212', 'empleado', 'empleado'),
(3, '1313', 'cliente', 'cliente'),
(4, '1414', '123456', 'proveedor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codCliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`codEmpleado`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productoproveedor`
--
ALTER TABLE `productoproveedor`
  ADD PRIMARY KEY (`codProPru`),
  ADD KEY `fk_proveedor` (`codProveedor`),
  ADD KEY `fk_producto` (`CodProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codProducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`codProveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `nomUsuario` (`nomUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productoproveedor`
--
ALTER TABLE `productoproveedor`
  MODIFY `codProPru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
