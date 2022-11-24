-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 18:16:00
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apirestconsult`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_customers`
--

CREATE TABLE `tb_customers` (
  `numero` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado_contribuyente` text COLLATE utf8_spanish2_ci NOT NULL,
  `condicion_domicilio` text COLLATE utf8_spanish2_ci NOT NULL,
  `ubigeo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_via` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_via` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_zona` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_zona` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `numero_domicilio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `interior_domicilio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `lote_domicilio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `departamento_domicilio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `manzana_domicilio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `kilometro_domicilio` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_customers`
--
ALTER TABLE `tb_customers`
  ADD PRIMARY KEY (`numero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
