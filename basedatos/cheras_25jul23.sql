-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2023 a las 23:46:50
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cheras`
--
CREATE DATABASE IF NOT EXISTS `cheras` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cheras`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `idAdmin` bigint(20) NOT NULL,
  `nomAdmin` varchar(60) NOT NULL,
  `emailAdmin` varchar(40) NOT NULL,
  `passAdmin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`idAdmin`, `nomAdmin`, `emailAdmin`, `passAdmin`) VALUES
(100, 'Stiven Serna', 'stiven@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` bigint(20) NOT NULL,
  `NomClient` varchar(30) NOT NULL,
  `ApeClient` varchar(30) NOT NULL,
  `DirClient` varchar(30) NOT NULL,
  `TelClient` varchar(10) NOT NULL,
  `EmailClient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `NomClient`, `ApeClient`, `DirClient`, `TelClient`, `EmailClient`) VALUES
(3, 'Peddrito Antonio', 'Perez Sozo', 'Finca Villa Libano - Algeciras', '3211234567', 'ppsozo@hotmail.com'),
(1075123456, 'Alan', 'Brito', 'Cra 5 No. 20-45 Los Alamos', '3123456777', 'alanb@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idDetalle` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `idProducto` smallint(11) NOT NULL,
  `cantProducto` int(11) NOT NULL,
  `precioDetalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`idDetalle`, `idFactura`, `idProducto`, `cantProducto`, `precioDetalle`) VALUES
(1, 1, 2, 2, 400000),
(2, 1, 1, 1, 35000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `IdFactura` int(11) NOT NULL,
  `Fecha/Hora` datetime NOT NULL,
  `IdCliente` bigint(20) NOT NULL,
  `totalFactura` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`IdFactura`, `Fecha/Hora`, `IdCliente`, `totalFactura`) VALUES
(1, '2023-07-25 23:42:14', 1075123456, 435000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` smallint(6) NOT NULL,
  `nomProducto` varchar(60) NOT NULL,
  `precioProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nomProducto`, `precioProducto`) VALUES
(1, 'Martillo grande amarillo cat', 35000),
(2, 'Carretilla naranja 1 cubo', 200000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idFactura` (`idFactura`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IdFactura`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `IdFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`IdFactura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
