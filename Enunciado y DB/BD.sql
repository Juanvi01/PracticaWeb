-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.27 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para hlc_practicaweb
DROP DATABASE IF EXISTS `hlc_practicaweb`;
CREATE DATABASE IF NOT EXISTS `hlc_practicaweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hlc_practicaweb`;

-- Volcando estructura para tabla hlc_practicaweb.suscripciones
DROP TABLE IF EXISTS `suscripciones`;
CREATE TABLE IF NOT EXISTS `suscripciones` (
  `Suscripcion` varchar(10) NOT NULL,
  PRIMARY KEY (`Suscripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla hlc_practicaweb.suscripciones: ~3 rows (aproximadamente)
DELETE FROM `suscripciones`;
/*!40000 ALTER TABLE `suscripciones` DISABLE KEYS */;
INSERT INTO `suscripciones` (`Suscripcion`) VALUES
	('Basic'),
	('Gold'),
	('Premium');
/*!40000 ALTER TABLE `suscripciones` ENABLE KEYS */;

-- Volcando estructura para tabla hlc_practicaweb.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Usuario` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Sexo` varchar(10) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `Avatar` longblob, 
  `Suscripcion` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Usuario`),
  KEY `FKSuscripcion` (`Suscripcion`),
  CONSTRAINT `FKSuscripcion` FOREIGN KEY (`Suscripcion`) REFERENCES `suscripciones` (`Suscripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla hlc_practicaweb.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
