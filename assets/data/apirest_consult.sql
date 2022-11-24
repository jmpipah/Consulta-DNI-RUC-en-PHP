-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para apirestconsult
CREATE DATABASE IF NOT EXISTS `apirestconsult` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `apirestconsult`;

-- Volcando estructura para tabla apirestconsult.citas


-- Volcando estructura para tabla apirestconsult.tb_customers
CREATE TABLE IF NOT EXISTS `tb_customers` (
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

-- Volcando datos para la tabla apirestconsult.tb_customers: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_customers` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
