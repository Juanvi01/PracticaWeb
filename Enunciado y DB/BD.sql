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

-- Volcando estructura para tabla hlc_practicaweb.pagina
DROP TABLE IF EXISTS `pagina`;
CREATE TABLE IF NOT EXISTS `pagina` (
  `Url` varchar(200) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla hlc_practicaweb.pagina: ~0 rows (aproximadamente)
DELETE FROM `pagina`;
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;
INSERT INTO `pagina` (`Url`) VALUES
	('about.php'),
	('diabetes.php'),
	('inicio.php');
/*!40000 ALTER TABLE `pagina` ENABLE KEYS */;

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

-- Volcando datos para la tabla hlc_practicaweb.usuarios: ~3 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`Usuario`, `Pass`, `Nombre`, `Sexo`, `FechaNac`, `Avatar`, `Suscripcion`) VALUES
	('root', 'root', 'root', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla hlc_practicaweb.visita
DROP TABLE IF EXISTS `visita`;
CREATE TABLE IF NOT EXISTS `visita` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `IdUsuario` varchar(50) NOT NULL DEFAULT '0',
  `IdPagina` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla hlc_practicaweb.visita: ~0 rows (aproximadamente)
DELETE FROM `visita`;
/*!40000 ALTER TABLE `visita` DISABLE KEYS */;
/*!40000 ALTER TABLE `visita` ENABLE KEYS */;
