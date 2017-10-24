CREATE DATABASE  IF NOT EXISTS `dbcontrolcapacitacion` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbcontrolcapacitacion`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: dbcontrolcapacitacion
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL AUTO_INCREMENT,
  `numContrato` varchar(45) NOT NULL,
  `fechaInicioLaboral` date NOT NULL,
  `fechaTerminacionContrato` date DEFAULT NULL,
  `tipoContrato_idtipoContrato` int(10) NOT NULL,
  `empresa` varchar(45) NOT NULL,
  `visibilidad` tinyint(1) NOT NULL,
  PRIMARY KEY (`idContrato`),
  UNIQUE KEY `numContrato` (`numContrato`),
  KEY `fk_Contrato_tipoContrato1_idx` (`tipoContrato_idtipoContrato`),
  CONSTRAINT `fk_Contrato_tipoContrato1` FOREIGN KEY (`tipoContrato_idtipoContrato`) REFERENCES `tipocontrato` (`idtipoContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES (2,'194000','2012-01-17','2012-06-17',1,'GF',1),(4,'109447425','2018-06-17','2001-06-18',1,'CyCP',1),(5,'0000100','2018-04-17','2001-11-17',2,'GF',1);
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-11 17:15:32
